<?php

namespace Dataloft\Application\Config\Providers;

use App\Providers\AppServiceProvider;
use Dataloft\Application\Config\UseCases\ConfigFinder;

final class ConfigServiceProvider extends AppServiceProvider
{
    #[\Override]
    public function register(): void {}

    #[\Override]
    public function boot(): void
    {
        (new ConfigFinder())->find(fn ($value) => $this->mergeConfigFrom($value, 'custom'));
    }
}
