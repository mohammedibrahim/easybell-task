<?php

declare(strict_types=1);

namespace EasyBell\Product\Domain;

use EasyBell\Checkout\Domain\Contracts\ProductRegularPriceAware;
use EasyBell\Product\Domain\Events\ProductHasCreatedEvent;
use EasyBell\Product\Domain\PriceRule\PriceRuleFactory;
use EasyBell\Shared\Domain\Aggregate\AggregateRoot;

class Product extends AggregateRoot implements ProductRegularPriceAware
{
    public function __construct(
        protected readonly ProductId $productId,
        protected ProductName        $name,
        protected ProductPrice       $price,
        protected PriceRuleFactory   $priceRuleFactory,
        protected ProductType             $productType,
    ) {}

    public static function create(ProductName $name, ProductPrice $price, PriceRuleFactory $priceRuleFactory): self
    {
        $product = new self(ProductId::random(), $name, $price, $priceRuleFactory, new ProductType(ProductTypeValues::SIMPLE));

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

    public function calculatePrice(int $quantity = 1): float
    {
        return $this->priceRuleFactory
            ->getRule($this)
            ->calculatePrice($quantity)
        ;
    }

    /**
     * @return array{"id": string, "name": string, "price": float}
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
}
