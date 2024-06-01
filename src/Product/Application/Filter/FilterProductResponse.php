<?php

declare(strict_types=1);

namespace EasyBell\Product\Application\Filter;

use EasyBell\Product\Domain\Product;
use EasyBell\Shared\Domain\Bus\Query\Response;
use EasyBell\Shared\Domain\Collection\CollectionContract;

final readonly class FilterProductResponse implements Response
{
    /**
     * @param CollectionContract<int, Product> $products
     */
    public function __construct(private CollectionContract $products) {}

    /**
     * @return CollectionContract<int, Product>
     */
    public function getProducts(): CollectionContract
    {
        return $this->products;
    }
}
