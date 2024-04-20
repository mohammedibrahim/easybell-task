<?php

declare(strict_types=1);

namespace App;

use App\PriceRule\PriceRuleFactory;
use App\ValueObject\ProductQuantityPriceRule;

readonly class Product
{
    public function __construct(
        private string $name,
        private float $price,
        private ?ProductQuantityPriceRule $priceRules = null,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(int $quantity = 1): float
    {
        $priceRule = $this->getPriceRules();

        $priceRule = (new PriceRuleFactory())->create($priceRule);

        return $priceRule->calculatePrice($quantity, $this->price);
    }

    public function getPriceRules(): ?ProductQuantityPriceRule
    {
        return $this->priceRules;
    }
}
