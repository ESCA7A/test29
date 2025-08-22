<?php

namespace Dataloft\Application\Routing\UseCases;

use FilesystemIterator;
use Illuminate\Support\Str;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class RouteFinder
{
    public function get(string $basePath): array
    {
        $routes = [];
        $rdi = new RecursiveDirectoryIterator($basePath, FilesystemIterator::KEY_AS_PATHNAME);
        $recursiveIterator = new RecursiveIteratorIterator($rdi);
        foreach ($recursiveIterator as $item) {
            if ($item->isDir()) {

                continue;
            }

            $riPathname = $item->getPathname();
            $routeIsExist = Str::contains($riPathname, 'routes');
            if (!$routeIsExist) {

                continue;
            }

            switch ($riPathname) {
                case str_contains($riPathname, 'api.php'):
                    $routes['api'] = $riPathname;
                    break;
                case str_contains($riPathname, 'web.php'):
                    $routes['web'] = $riPathname;
                    break;
                default:
                    $routes['other'] = $riPathname;
            }
        }

        return $routes;
    }
}
