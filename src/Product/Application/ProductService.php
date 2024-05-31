<?php

declare(strict_types=1);

namespace EasyBell\Product\Application;

use EasyBell\Product\Domain\Contracts\ProductRepositoryContract;
use EasyBell\Product\Domain\Exceptions\ProductException;
use EasyBell\Product\Domain\PriceRule\PriceRuleFactory;
use EasyBell\Product\Domain\Product;
use EasyBell\Shared\Domain\Bus\Event\EventBus;
use EasyBell\Shared\Domain\Collection\Contracts\CollectionContract;
use Ramsey\Uuid\Uuid;

final class ProductService
{
    public function __construct(
        protected readonly ProductRepositoryContract $repository,
        protected readonly EventBus $bus,
        protected readonly PriceRuleFactory $priceRuleFactory,
    ) {}

    /**
     * @return CollectionContract<int, Product>
     */
    public function list(): CollectionContract
    {
        return $this->repository->list();
    }

    public function create(string $productName, float $price): void
    {
        $product = Product::create(Uuid::uuid4()->toString(), $productName, $price, $this->priceRuleFactory);

        $this->repository->create($product);

        $this->bus->publish(...$product->pullDomainEvents());
    }

    public function get(string $productName): Product
    {
        $product = $this->repository->list()->filterItems(fn ($item) => $item->getName() === $productName)->firstItem();

        if (!$product) {
            throw ProductException::productNotFound($productName);
        }

        return $product;
    }

    // @TODO: implementation of the product crud operations.
}
