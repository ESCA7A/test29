<?php

namespace Dataloft\Application\Config\UseCases;

use Dataloft\Application\Core\DirectoryParser\UseCases\FilePathsFinder;

final readonly class ConfigFinder
{
    public function find(Callable $callback = null): void
    {
        (new FilePathsFinder())->find(
            config('custom.config_directory', 'config'),
            base_path(config('custom.root_directory', 'dataloft')),
            function ($pathname, $paths) use($callback) {
                $callback($pathname);

                return $paths;
            },
        );
    }
}
