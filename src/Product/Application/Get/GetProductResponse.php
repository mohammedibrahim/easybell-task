<?php

declare(strict_types=1);

namespace EasyBell\Product\Application\Get;

use EasyBell\Product\Domain\Product;
use EasyBell\Shared\Domain\Bus\Query\Response;

final readonly class GetProductResponse implements Response
{
    public function __construct(private Product $product) {}

    public function getProduct(): Product
    {
        return $this->product;
    }
}
