<?php

declare(strict_types=1);

namespace App\PriceRule;

use App\Contracts\PriceRule;
use App\ValueObject\ProductQuantityPriceRule;

class SpecialPrice implements PriceRule
{
    public function __construct(private readonly ProductQuantityPriceRule $priceRule) {}

    public function calculatePrice(int $quantity, float $regularPrice): float
    {
        $specialGroups = floor($quantity / $this->priceRule->getQuantity());

        $remainingItems = $quantity % $this->priceRule->getQuantity();

        return $specialGroups * $this->priceRule->getAmount() + $remainingItems * $regularPrice;
    }
}
