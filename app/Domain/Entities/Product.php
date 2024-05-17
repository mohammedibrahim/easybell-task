<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\PriceRule\PriceRuleFactory;

class Product
{
    public function __construct(
        protected string $name,
        protected float $price,
        protected PriceRuleFactory $priceRuleFactory,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function calculatePrice(int $quantity = 1): float
    {
        return $this->priceRuleFactory
            ->getRule($this)
            ->calculatePrice($quantity, $this->getPrice())
        ;
    }
}
