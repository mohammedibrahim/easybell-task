<?php

declare(strict_types=1);

namespace EasyBell\Product\Infrastructure\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use EasyBell\Shared\Infrastructure\Doctrine\Dbal\DbalTypesSearcher;
use EasyBell\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;

final class ProductEntityManagerFactory
{
    private const SCHEMA_PATH = __DIR__.'/../../../../etc/databases/product.sql';

    public static function create(array $parameters, string $environment): EntityManagerInterface
    {
        $parameters['port'] = (int)$parameters['port'];

        $isDevMode = $environment !== 'prod';

        $prefixes = [
            __DIR__.'/../../../Product/Infrastructure/Doctrine' => 'EasyBell\Product\Domain',
        ];

        $dbalCustomTypesClasses = DbalTypesSearcher::inPath(__DIR__.'/..', 'Product');

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            self::SCHEMA_PATH,
            $dbalCustomTypesClasses
        );
    }
}
