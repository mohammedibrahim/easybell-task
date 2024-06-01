<?php

declare(strict_types=1);

namespace EasyBell\Product\Domain;

use EasyBell\Product\Domain\Events\ProductHasCreatedEvent;
use EasyBell\Shared\Domain\Aggregate\AggregateRoot;

class Product extends AggregateRoot {
    public function __construct(
        protected readonly ProductId $productId,
        protected ProductName $name,
        protected ProductPrice $price,
        protected ProductType $productType,
    ) {
        $this->productType = new ProductType(ProductTypeValues::SIMPLE);
    }

    public static function create(ProductName $name, ProductPrice $price): self
    {
        $product = new self(ProductId::random(), $name, $price, new ProductType(ProductTypeValues::SIMPLE));

        $productCreatedEvent = new ProductHasCreatedEvent(
            $product->getProductId(),
            $product->getName(),
            $product->getPrice(),
        );

        $product->record($productCreatedEvent);

        return $product;
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
        return new ProductType(ProductTypeValues::SIMPLE);
    }


}
