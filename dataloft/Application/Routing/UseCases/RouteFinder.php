<?php

namespace Dataloft\Application\Routing\UseCases;

use FilesystemIterator;
use Illuminate\Support\Str;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

final class RouteFinder
{
    public function register(string $basePath, callable $callback = null): never
    {
        $rdi = new RecursiveDirectoryIterator($basePath, FilesystemIterator::KEY_AS_PATHNAME);
        $recursiveIterator = new RecursiveIteratorIterator($rdi);
        foreach ($recursiveIterator as $item) {
            if ($item->isDir()) {

                continue;
            }

            $riPathname = $item->getPathname();
            $routeIsExist = Str::contains($riPathname, config('custom.routes_directory', 'routes'));
            if (!$routeIsExist) {

                continue;
            }

            if ($callback) {
                $callback($riPathname);
            }
        }
    }
}
