<?php

declare(strict_types=1);

namespace EasyBell\Checkout\Domain;

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

    public static function createSpecialProduct(ProductId $productId, ProductName $name, ProductPrice $price, SpecialProductQuantity $specialQuantity, SpecialProductPrice $specialPrice): self
    {
        return new self($productId, $name, $price, $specialQuantity, $specialPrice);
    }

    public function getPriceRule(): ProductQuantityPriceRule
    {
        return new ProductQuantityPriceRule($this->specialQuantity, $this->specialPrice);
    }

    /**
     * @return array{
     *     "product_id": string,
     *     "name": string,
     *     "price": float,
     *     "price_rule": array{"quantity": int, "amount": float}
     * }
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), ['price_rule' => $this->getPriceRule()->toArray()]);
    }

    public function calculatePrice(int $quantity = 1): float
    {
        $priceRule = $this->getPriceRule();

        $specialPriceGroups = floor($quantity / $priceRule->getQuantity()->value());

        $remainingItems = $quantity % $priceRule->getQuantity()->value();

        return $specialPriceGroups * $priceRule->getPrice()->value() + parent::calculatePrice($remainingItems);
    }
}
