<?php

declare(strict_types=1);

namespace EasyBell\Product\Application\Create;

use EasyBell\Product\Domain\Contracts\ProductRepositoryContract;
use EasyBell\Product\Domain\Product;
use EasyBell\Product\Domain\ProductName;
use EasyBell\Product\Domain\ProductPrice;
use EasyBell\Product\Domain\SpecialProduct;
use EasyBell\Product\Domain\SpecialProductPrice;
use EasyBell\Product\Domain\SpecialProductQuantity;
use EasyBell\Shared\Domain\Bus\Event\EventBus;

final class ProductCreator
{
    public function __construct(
        protected readonly ProductRepositoryContract $repository,
        protected readonly EventBus $bus,
    ) {}

    public function create(ProductName $productName, ProductPrice $price): void
    {
        $product = Product::create($productName, $price);

        $this->repository->create($product);

        $this->bus->publish(...$product->pullDomainEvents());
    }

    public function createSpecialProduct(ProductName $productName, ProductPrice $price, SpecialProductQuantity $productQuantity, SpecialProductPrice $specialProductPrice): void
    {
        $product = SpecialProduct::createSpecialProduct($productName, $price, $productQuantity, $specialProductPrice);

        $this->repository->create($product);

        $this->bus->publish(...$product->pullDomainEvents());
    }
}
