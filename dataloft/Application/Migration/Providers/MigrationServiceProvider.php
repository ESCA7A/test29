<?php

namespace Dataloft\Application\Migration\Providers;

use App\Providers\AppServiceProvider;
use Dataloft\Application\Migration\UseCases\MigrationFinder;

final class MigrationServiceProvider extends AppServiceProvider
{
    #[\Override]
    public function register(): void
    {
        //
    }

    #[\Override]
    public function boot(): void
    {
        $this->loadMigrationsFrom((new MigrationFinder())->getPaths());
    }
}
