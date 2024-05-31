<?php

declare(strict_types=1);

namespace EasyBell\Shared\Infrastructure\Doctrine\Dbal;

use function Lambdish\Phunctional\filter;
use function Lambdish\Phunctional\map;
use function Lambdish\Phunctional\reduce;

final class DbalTypesSearcher
{
    public static function inPath(string $path, string $contextName): array
    {
        $possibleDbalDirectories = self::possibleDbalPaths($path);

        $dbalDirectories = filter(self::isExistingDbalPath(), $possibleDbalDirectories);

        return reduce(self::dbalClassesSearcher($contextName), $dbalDirectories, []);
    }

    private static function modulesInPath(string $path): array
    {
        return filter(
            static fn (string $possibleModule): bool => !in_array($possibleModule, ['.', '..'], true),
            (array) scandir($path)
        );
    }

    private static function possibleDbalPaths(string $path): array
    {
        return map(
            static fn (mixed $_unused, string $module) => realpath("{$path}/{$module}"),
            array_flip(self::modulesInPath($path))
        );
    }

    private static function isExistingDbalPath(): callable
    {
        return static fn (string $path): bool => !empty($path);
    }

    private static function dbalClassesSearcher(string $contextName): callable
    {
        return static function (array $totalNamespaces, string $path) use ($contextName): array {
            $possibleFiles = (array) scandir($path);

            $files = filter(static fn (string $file): bool => str_ends_with($file, 'Type.php'), $possibleFiles);

            $namespaces = map(
                static function (string $file) use ($path, $contextName): string {
                    $fullPath = "{$path}/{$file}";
                    $splittedPath = explode("/src/{$contextName}/", $fullPath);

                    $classWithoutPrefix = str_replace(['.php', '/'], ['', '\\'], $splittedPath[1]);

                    return "EasyBell\\{$contextName}\\{$classWithoutPrefix}";
                },
                $files
            );

            return array_merge($totalNamespaces, $namespaces);
        };
    }
}
