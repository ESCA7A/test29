<?php

namespace Dataloft\Application\Routing\UseCases;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

final readonly class Registrar
{
    public function init(): void
    {
        $dddData = $this->toRecursive(config('domains.dataloft'));

        $dddData->map(function ($contextList, $domain) {
            /** @var Collection $contextList */
            $contextList->map(function ($context) use ($domain, $contextList) {
                $path = base_path('dataloft') . "/{$domain}/{$context}";
                if (!realpath($path)) {
                    Log::debug(__('Путь не существует'), ['domain' => $domain, 'context' => $context, 'path' => $path,]);

                    throw new RouteNotFoundException(__('Путь не существует. Проверьте конфигурацию: :path', [
                        'path' => $path,
                    ]));
                }
                (new RouteFinder())->register($path, function ($route) use ($domain, $context) {
                    $domainUri = Str::lower($domain);
                    $contextUri = Str::lower($context);

                    switch ($route) {
                        case str_contains($route, 'api.php'):
                            Route::middleware('api')->prefix($domainUri)
                                ->group(fn () => Route::prefix($contextUri)->group($route));
                            break;
                        case str_contains($route, 'web.php'):
                            Route::middleware('web')->prefix($domainUri)
                                ->group(fn () => Route::prefix($contextUri)->group($route));
                            break;
                        default:
                            Route::prefix($domainUri)->group(fn () => Route::prefix($contextUri)->group($route));
                    }
                });
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
