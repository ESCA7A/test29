<?php

namespace Dataloft\Package\Routing\Providers;

use FilesystemIterator;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class RouteServiceProvider extends \App\Providers\RouteServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->registerDomains();

//        $this->routes(function () {
//            Route::middleware('api')
//                ->prefix('api')
//                ->group(base_path('routes/api.php'));
//
//            Route::middleware('web')
//                ->group(base_path('routes/web.php'));
//        });
    }

    /**
     * @return void
     */
    private function registerDomains(): void
    {
        $this->getDomainsData()->map(function ($domains) {
            $domains->map(function ($prefixes, $domain) {
                /**
                 * @var Collection $routes
                 */
                $prefixes->get('prefixes')->map(function ($routes, $prefix) use ($domain) {
                    Route::prefix(Str::lower($domain))->group(function () use ($routes, $prefix) {
                        Route::prefix($prefix)->group($routes->toArray());
                    });
                });
            });
        });
    }

    /**
     * Собирает все роуты и префиксы (bounded contexts)
     * Каждому роуту будет добавлен его контекст в качестве префикса
     *
     * @todo: кешировать для прода
     * @todo: исправить ситуацию когда роуты с одинаковым ендпоинтом отображаются как единая точка
     * - Это случается так как у них один контекст и единый middleware.
     * @todo: класть в коллекцию списки заранее. Как только списки будут заданы
     * @todo удалить @method toRecursive(array $data)
     */
    private function getDomainsData(): Collection
    {
        $contextRouteList = [];
        $domainData = [];

        $domainsConfig = config('domains.base_domain_directories.dataloft');
        $path = base_path('dataloft');
        $domainNames = collect($domainsConfig)->keys();

        foreach ($domainNames as $domain) {
            $prefixesContext = [];
            $domainPath = "{$path}/{$domain}";

            if (!realpath($domainPath)) {
                Log::debug('Указанный домен не существует', ['domain' => $domain]);
                throw new RouteNotFoundException(__('Указанный домен не существует: :domain', [
                    'domain' => $domain
                ]));
            }


            $boundedContextList = config("domains.base_domain_directories.dataloft.{$domain}");
            if (!$boundedContextList) {
                Log::debug('Bounded контексты не указаны', ['list' => $boundedContextList]);
                throw new RouteNotFoundException(__('Bounded контексты не указаны: :list', [
                    'list' => json_encode($boundedContextList)
                ]));
            }

            foreach ($boundedContextList as $context) {
                $iteratorPath = "{$domainPath}/{$context}";

                if (!realpath($iteratorPath)) {
                    Log::debug('Указанный bounded context не существует', ['bounded context title' => $context]);
                    throw new RouteNotFoundException(__('Указанный bounded context не существует: :title', [
                        'title' => $context
                    ]));
                }

                $context = Str::lower($context);

                /**
                 * @var RecursiveDirectoryIterator $item
                 *
                 * поиск директории routes и сбор всех роутов текущего баунд контекста
                 */
                $rdi = new RecursiveDirectoryIterator($iteratorPath, FilesystemIterator::KEY_AS_PATHNAME);
                $recursiveIterator = new RecursiveIteratorIterator($rdi);
                $contextRouteList = [];
                foreach ($recursiveIterator as $item) {
                    if ($item->isDir()) {

                        continue;
                    }

                    $riPathname = $item->getPathname();
                    $routeIsExist = Str::contains($riPathname, 'routes');
                    if (!$routeIsExist) {

                        continue;
                    }

                    $contextRouteList[] = $riPathname;
                }
                if (!$contextRouteList) {
                    Log::debug('Указанный bounded context не имеет маршрутов', ['route list' => $contextRouteList]);
                    throw new RouteNotFoundException(__('Указанный bounded context не имеет маршрутов: :title', [
                        'title' => $context
                    ]));
                }

                $prefixesContext['prefixes'][$context] = $contextRouteList;
                unset($contextRouteList);
            }

            $domains[$domain] = $prefixesContext;
            $domainData['domains'] = $domains;
            unset($prefixesContext);
        }

        return $this->toRecursive($domainData);
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
