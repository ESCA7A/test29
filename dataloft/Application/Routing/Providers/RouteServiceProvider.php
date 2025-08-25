<?php

namespace Dataloft\Application\Routing\Providers;

use Dataloft\Application\Routing\UseCases\Registrar;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

final class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{
    public const HOME = '/home';

    #[\Override]
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        (new Registrar())->init();
    }
}
