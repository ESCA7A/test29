<?php

namespace Dataloft\Application\Migration\UseCases;

use FilesystemIterator;
use Illuminate\Support\Str;
use PHPUnit\TextUI\XmlConfiguration\MigrationException;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

final readonly class MigrationFinder
{
    function getPaths(): array
    {
        $migrationPaths = [];
        $iteratorPath = base_path('dataloft');
        $recursiveIterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($iteratorPath, FilesystemIterator::KEY_AS_PATHNAME));

        /**
         * @var RecursiveDirectoryIterator $item
         */
        foreach ($recursiveIterator as $item) {
            if ($item->isDir()) {
                continue;
            }

            $pathname = $item->getPathname();
            $pathContainDir = Str::contains($pathname, 'migrations');

            if ($pathContainDir) {
                $migrationPaths[] = $pathname;
            }
        }

        if (!$migrationPaths) {
            throw new MigrationException(__('Миграции не найдены'));
        }

        return $migrationPaths;
    }
}
