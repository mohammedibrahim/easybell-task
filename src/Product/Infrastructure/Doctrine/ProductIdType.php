<?php

declare(strict_types=1);

namespace EasyBell\Product\Infrastructure\Doctrine;

use EasyBell\Product\Domain\ProductId;
use EasyBell\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class ProductIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return ProductId::class;
    }

}