<?php

declare(strict_types=1);

namespace EasyBell\Product\Application\Get;

use EasyBell\Shared\Domain\Bus\Query\Query;

class GetProductQuery implements Query
{
    public function __construct(private readonly string $productId) {}

    public function getProductId(): string
    {
        return $this->productId;
    }
}
