<?php

declare(strict_types=1);

namespace EasyBell\Checkout\Domain\ValueObject;

readonly class CartItem
{
    public function __construct(
        protected string $productName,
        protected float $price,
        protected int $quantity,
    ) {}

    public function getProductName(): string
    {
        return $this->productName;
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
