<?php

namespace EasyBell\Product\Domain\Contracts;

use EasyBell\Product\Domain\Product;
use EasyBell\Product\Domain\ProductId;
use EasyBell\Shared\Domain\Collection\CollectionContract;
use EasyBell\Shared\Domain\Criteria\Criteria;

interface ProductRepositoryContract
{
    /**
     * @return CollectionContract<int, Product>
     */
    public function list(): CollectionContract;

    public function get(ProductId $productId): ?Product;

    public function create(Product $product): void;

    /**
     * @return CollectionContract<int, Product>
     */
    public function filter(Criteria $criteria): CollectionContract;
}
