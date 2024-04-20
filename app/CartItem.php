<?php

declare(strict_types=1);

namespace App;

readonly class CartItem
{
    public function __construct(
        private string $name,
        private float $price,
        private int $quantity,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
