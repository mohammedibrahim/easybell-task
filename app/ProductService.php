<?php

declare(strict_types=1);

namespace App;

use App\Contracts\CollectionContract;

readonly class ProductService
{
    /**
     * @param CollectionContract<int, Product> $products
     */
    public function __construct(
        private CollectionContract $products
    ) {}

    /**
     * @return CollectionContract<int, Product>
     */
    public function list(): CollectionContract
    {
        return $this->products;
    }

    // @todo implementation of the product crud operations.
}
