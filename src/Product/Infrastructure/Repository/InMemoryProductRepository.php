<?php

declare(strict_types=1);

namespace EasyBell\Product\Infrastructure\Repository;

use EasyBell\Product\Domain\Contracts\ProductRepositoryContract;
use EasyBell\Product\Domain\Product;
use EasyBell\Product\Domain\ProductId;
use EasyBell\Shared\Domain\Collection\CollectionContract;
use EasyBell\Shared\Domain\Criteria\Criteria;
use EasyBell\Shared\Infrastructure\Collection\Collection;

class InMemoryProductRepository implements ProductRepositoryContract
{
    /**
     * @var CollectionContract<int, Product>
     */
    private readonly CollectionContract $products;

    public function __construct(
    ) {
        $this->products = new Collection();
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

    /**
     * @return CollectionContract<int, Product>
     */
    public function filter(Criteria $criteria): CollectionContract
    {
        return $this->products;
    }
}
