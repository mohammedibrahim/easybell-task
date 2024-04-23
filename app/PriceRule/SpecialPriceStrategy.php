<?php

declare(strict_types=1);

namespace App\PriceRule;

use App\Contracts\PriceRule;
use App\ValueObject\ProductQuantityPriceRule;

readonly class SpecialPriceStrategy implements PriceRule
{
    public function __construct(private ProductQuantityPriceRule $priceRule) {}

    public function calculatePrice(int $quantity, float $regularPrice): float
    {
        $specialPriceGroups = floor($quantity / $this->priceRule->getQuantity());

        $remainingItems = $quantity % $this->priceRule->getQuantity();

        return $specialPriceGroups * $this->priceRule->getAmount() + $remainingItems * $regularPrice;
    }
}
