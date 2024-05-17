<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

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

    public function __toString(): string
    {
        return sprintf('Special Price: %d for %d', $this->quantity, $this->amount);
    }
}
