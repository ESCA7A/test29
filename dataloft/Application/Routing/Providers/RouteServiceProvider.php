<?php

namespace Dataloft\Application\Routing\Providers;

use Dataloft\Application\Routing\UseCases\RouteFinder;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{
    public const HOME = '/home';

    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->registerDomains();
    }

    /**
     * @return void
     */
    private function registerDomains(): void
    {
        $dddData = $this->toRecursive(config('domains.base_domain_directories.dataloft'));
        $dddData->map(function ($contextList, $domain) {
            /** @var Collection $contextList */
            $contextList->map(function ($context) use ($domain, $contextList) {
                $path = base_path('dataloft') . "/{$domain}/{$context}";
                if (!realpath($path)) {
                    Log::debug('Путь не существует. Проверьте конфигурацию', [
                        'domain' => $domain,
                        'context' => $context,
                        'path' => $path,
                    ]);

                    throw new RouteNotFoundException(__('Путь не существует. Проверьте конфигурацию: :path', [
                        'path' => $path,
                    ]));
                }

                $routes = (new RouteFinder())->get($path);

                if (key_exists('web', $routes)) {
                    Route::middleware('web')->prefix(Str::lower($domain))->group(function () use ($routes, $context) {
                        Route::prefix(Str::lower($context))->group($routes);
                    });
                }

                if (key_exists('api', $routes)) {
                    Route::middleware('api')->prefix(Str::lower($domain))->group(function () use ($routes, $context) {
                        Route::prefix(Str::lower($context))->group($routes);
                    });
                }

                if (key_exists('other', $routes)) {
                    Route::prefix(Str::lower($domain))->group(function () use ($routes, $context) {
                        Route::prefix(Str::lower($context))->group($routes);
                    });
                }
            });
        });
    }

    private function toRecursive(array $data): Collection
    {
        $collection = collect();

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $collection->put($key, $this->toRecursive($value));
            } else {
                $collection->put($key, $value);
            }
        }

        return $collection;
    }
}
