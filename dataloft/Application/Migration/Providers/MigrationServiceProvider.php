<?php

namespace Dataloft\Application\Migration\Providers;

use App\Providers\AppServiceProvider;
use Dataloft\Application\Migration\UseCases\MigrationFinder;

final class MigrationServiceProvider extends AppServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom((new MigrationFinder())->getPaths());
    }
}
