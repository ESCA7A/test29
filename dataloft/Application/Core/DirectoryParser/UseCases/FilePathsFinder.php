<?php

namespace Dataloft\Application\Core\DirectoryParser\UseCases;

use FilesystemIterator;
use Illuminate\Support\Str;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

final readonly class FilePathsFinder
{
    /**
     * @param string $key
     * @param string $basePath
     * @param callable|null $callback
     * @return array
     */
    public function find(string $key, string $basePath, Callable $callback = null): array
    {
        $paths = [];
        $iteratorPath = $basePath;
        $recursiveIterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($iteratorPath, FilesystemIterator::KEY_AS_PATHNAME));

        /**
         * @var RecursiveDirectoryIterator $item
         */
        foreach ($recursiveIterator as $item) {
            if ($item->isDir()) {
                continue;
            }

            $pathname = $item->getPathname();
            $pathContainDir = Str::contains($pathname, $key);

            if (!$pathContainDir) {
                continue;
            }

            if (!$callback) {
                $paths[] = $pathname;
                continue;
            }

            $result = $callback($pathname, $paths);
            $paths = array_merge($result, $paths);
        }

        unset($recursiveIterator);

        return $paths;
    }
}
