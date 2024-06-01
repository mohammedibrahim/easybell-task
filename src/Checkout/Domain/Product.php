<?php

declare(strict_types=1);

namespace EasyBell\Checkout\Domain;

use EasyBell\Shared\Domain\Aggregate\AggregateRoot;

class Product extends AggregateRoot
{
    public function __construct(
        protected readonly ProductId $productId,
        protected ProductName $name,
        protected ProductPrice $price,
        protected ProductType $productType,
    ) {}

    public static function create(ProductId $productId, ProductName $name, ProductPrice $price): self
    {
        return new self($productId, $name, $price, new ProductType(ProductTypeValues::SIMPLE));
    }

    public function getName(): ProductName
    {
        return $this->name;
    }

    public function getPrice(): ProductPrice
    {
        return $this->price;
    }

    public function getProductId(): ProductId
    {
        return $this->productId;
    }

    public function calculatePrice(int $quantity = 1): float
    {
        return $quantity * $this->getPrice()->value();
    }

    /**
     * @return array{"product_id": string, "name": string, "price": float}
     */
    public function toArray(): array
    {
        return [
            'product_id' => $this->getProductId()->value(),
            'name' => $this->getName()->value(),
            'price' => $this->getPrice()->value(),
        ];
    }

    public function toJson(): string
    {
        return (string) json_encode($this->toArray());
    }

    public function getProductType(): ProductType
    {
        return $this->productType;
    }
}
