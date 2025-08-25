<?php

namespace Dataloft\Application\Migration\Providers;

use App\Providers\AppServiceProvider;
use Dataloft\Application\Migration\UseCases\MigrationFinder;

final class MigrationServiceProvider extends AppServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom((new MigrationFinder())->getPaths());
    }
}
