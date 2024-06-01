<?php

declare(strict_types=1);

namespace EasyBell\Product\Domain;

use EasyBell\Product\Domain\Events\ProductHasCreatedEvent;

class SpecialProduct extends Product
{
    public function __construct(
        ProductId $productId,
        ProductName $name,
        ProductPrice $price,
        private SpecialProductQuantity $specialQuantity,
        private SpecialProductPrice $specialPrice,
    ) {
        parent::__construct($productId, $name, $price, new ProductType(ProductTypeValues::SPECIAL));
    }

    public static function createSpecialProduct(ProductName $name, ProductPrice $price, SpecialProductQuantity $specialQuantity, SpecialProductPrice $specialPrice): self
    {
        $product = new self(ProductId::random(), $name, $price, $specialQuantity, $specialPrice);

        $productCreatedEvent = new ProductHasCreatedEvent(
            $product->getProductId(),
            $product->getName(),
            $product->getPrice(),
        );

        $product->record($productCreatedEvent);

        return $product;
    }

    public function getPriceRule(): ProductQuantityPriceRule
    {
        return new ProductQuantityPriceRule($this->specialQuantity, $this->specialPrice);
    }

    /**
     * @return array{"product_id": string, "name": string, "price": float, "price_rule": array{"quantity": int, "amount": float}}
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), ['price_rule' => $this->getPriceRule()->toArray()]);
    }

    public function getProductType(): ProductType
    {
        return new ProductType(ProductTypeValues::SPECIAL);
    }
}
