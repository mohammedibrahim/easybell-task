<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\Contracts\CollectionContract;
use App\Domain\Entities\Product;
use App\Domain\Exceptions\ProductException;

class ProductService
{
    /**
     * @param CollectionContract<int, Product> $products
     */
    public function __construct(
        protected readonly CollectionContract $products
    ) {}

    /**
     * @return CollectionContract<int, Product>
     */
    public function list(): CollectionContract
    {
        return $this->products;
    }

    public function get(string $productName): Product
    {
        $product = $this->list()->filterItems(fn ($item) => $item->getName() === $productName)->firstItem();

        if (!$product) {
            throw ProductException::productNotFound($productName);
        }

        return $product;
    }

    // @TODO: implementation of the product crud operations.
}
