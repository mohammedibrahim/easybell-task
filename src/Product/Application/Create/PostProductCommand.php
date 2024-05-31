<?php

declare(strict_types=1);

namespace EasyBell\Product\Application\Create;

use EasyBell\Shared\Domain\Bus\Command\Command;

class PostProductCommand implements Command
{
    public function __construct(
        protected readonly string $productName,
        protected readonly float $price,
    ) {}

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
