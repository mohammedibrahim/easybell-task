<?php

declare(strict_types=1);

namespace App\ValueObject;

readonly class ProductQuantityPriceRule
{
    public function __construct(
        private int $quantity,
        private float $amount,
    ) {}

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }
}
