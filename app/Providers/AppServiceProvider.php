<?php

namespace App\Providers;

use FilesystemIterator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class AppServiceProvider extends ServiceProvider
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
        $this->loadMigrationsFrom($this->getMigrations());
    }

    function getMigrations(): array
    {
        $iteratorPath = base_path('dataloft');
        $recursiveIterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($iteratorPath, FilesystemIterator::KEY_AS_PATHNAME));
        $migrationPaths = [];

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

        return $migrationPaths;
    }
}
