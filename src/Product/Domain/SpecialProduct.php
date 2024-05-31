<?php

declare(strict_types=1);

namespace EasyBell\Product\Domain;

use EasyBell\Checkout\Domain\Contracts\ProductRegularPriceAndSpecialRuleAware;
use EasyBell\Product\Domain\Events\ProductHasCreatedEvent;
use EasyBell\Product\Domain\PriceRule\PriceRuleFactory;

class SpecialProduct extends Product implements ProductRegularPriceAndSpecialRuleAware
{
    public function __construct(
        ProductId $productId,
        ProductName $name,
        ProductPrice $price,
        PriceRuleFactory $priceRuleFactory,
        private SpecialProductQuantity $specialQuantity,
        private SpecialProductPrice $specialPrice,
    ) {
        parent::__construct($productId, $name, $price, $priceRuleFactory, new ProductType(ProductTypeValues::SPECIAL));
    }

    public static function createSpecialProduct(ProductName $name, ProductPrice $price, PriceRuleFactory $priceRuleFactory, SpecialProductQuantity $specialQuantity, SpecialProductPrice $specialPrice, ): self
    {
        $product = new self(ProductId::random(), $name, $price, $priceRuleFactory, $specialQuantity, $specialPrice);

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
     * @return array{"id": string, "name": string, "price": float, "quantity": int, "amount": float}
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), ['price_rule' => $this->getPriceRule()->toArray()]);
    }
}
