<?php

declare(strict_types=1);

namespace EasyBell\Product\Application\Create;

use EasyBell\Shared\Domain\Bus\Command\Command;

class PostSpecialProductCommand implements Command
{
    public function __construct(
        private readonly string $productName,
        private readonly float $price,
        private readonly int $quantity,
        private readonly float $specialPrice,
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

    public function getSpecialPrice(): float
    {
        return $this->specialPrice;
    }
}
