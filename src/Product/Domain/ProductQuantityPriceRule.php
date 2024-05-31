<?php

declare(strict_types=1);

namespace EasyBell\Product\Domain;

readonly class ProductQuantityPriceRule
{
    public function __construct(
        private SpecialProductQuantity $quantity,
        private SpecialProductPrice $price,
    ) {}

    public function __toString(): string
    {
        return sprintf('Special Price: %d for %d', $this->quantity->value(), $this->price->value());
    }

    public function getQuantity(): SpecialProductQuantity
    {
        return $this->quantity;
    }

    public function getPrice(): SpecialProductPrice
    {
        return $this->price;
    }

    /**
     * @return array{"quantity": int, "amount": float}
     */
    public function toArray(): array
    {
        return [
            'quantity' => $this->quantity->value(),
            'amount' => $this->price->value(),
        ];
    }
}
