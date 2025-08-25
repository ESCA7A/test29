<?php

namespace Dataloft\Application\Config\Providers;

use App\Providers\AppServiceProvider;
use Dataloft\Application\Config\UseCases\ConfigFinder;

final class ConfigServiceProvider extends AppServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        (new ConfigFinder())->find(fn ($value) => $this->mergeConfigFrom($value, 'custom'));
    }
}
