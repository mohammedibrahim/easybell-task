<?php

declare(strict_types=1);

namespace EasyBell\Product\Infrastructure\Repository;

use EasyBell\Product\Domain\Contracts\ProductRepositoryContract;
use EasyBell\Product\Domain\Product;
use EasyBell\Product\Domain\ProductId;
use EasyBell\Shared\Domain\Collection\Contracts\CollectionContract;
use EasyBell\Shared\Domain\Criteria\Criteria;

class InMemoryProductRepository implements ProductRepositoryContract
{
    /**
     * @param CollectionContract<int, Product> $products
     */
    public function __construct(
        private readonly CollectionContract $products,
    ) {

    }

    /**
     * @return CollectionContract<int, Product>
     */
    public function list(): CollectionContract
    {
        return $this->products;
    }

    public function get(ProductId $productId): ?Product
    {
        return $this->list()->filterItems(fn ($item) => $item->getProductId() === $productId)->firstItem() ?? null;
    }


    public function create(Product $product): void
    {
        $this->products->addItem($product);
    }

    public function filter(Criteria $criteria): CollectionContract
    {
        return $this->products;
    }
}
