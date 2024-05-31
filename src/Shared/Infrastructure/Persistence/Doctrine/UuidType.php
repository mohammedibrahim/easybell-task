<?php

declare(strict_types=1);

namespace EasyBell\Shared\Infrastructure\Persistence\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;
use EasyBell\Shared\Domain\Utils;
use EasyBell\Shared\Infrastructure\Doctrine\Dbal\DoctrineCustomType;
use function Lambdish\Phunctional\last;

abstract class UuidType extends StringType implements DoctrineCustomType
{
    final public static function customTypeName(): string
    {
        return Utils::toSnakeCase(str_replace('Type', '', (string) last(explode('\\', static::class))));
    }

    final public function getName(): string
    {
        return self::customTypeName();
    }

    final public function convertToPHPValue($value, AbstractPlatform $platform): mixed
    {
        $className = $this->typeClassName();

        return new $className($value);
    }

    final public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        // @var Uuid $value
        return $value->value();
    }

    abstract protected function typeClassName(): string;
}
