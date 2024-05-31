<?php

declare(strict_types=1);

namespace EasyBell\Product\Application\Filter;

use EasyBell\Shared\Domain\Bus\Query\Response;
use EasyBell\Shared\Domain\Collection\Contracts\CollectionContract;

final readonly class FilterProductResponse implements Response
{
    public function __construct(private CollectionContract $products) {}

    public function getProducts(): CollectionContract
    {
        return $this->products;
    }
}
