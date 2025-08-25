<?php

namespace Dataloft\Application\Migration\UseCases;

use Dataloft\Application\Core\DirectoryParser\UseCases\FilePathsFinder;
use Illuminate\Support\Facades\Log;

final readonly class MigrationFinder
{
    function getPaths(): array
    {
        $migrationPaths = (new FilePathsFinder())->find(
            key: config('custom.migration_directory', 'migrations'),
            basePath: base_path(config('custom.root_directory', 'dataloft'))
        );

        if (!$migrationPaths) {
            Log::debug(__('Миграций не обнаружено'));
        }

        return $migrationPaths;
    }
}
