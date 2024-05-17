<?php

declare(strict_types=1);

namespace App\Domain\PriceRule;

use App\Domain\Contracts\PriceRule;
use App\Domain\Contracts\SpecialProductRuleAware;
use App\Domain\ValueObject\ProductQuantityPriceRule;

class SpecialPriceStrategy implements PriceRule
{
    public function __construct(protected readonly SpecialProductRuleAware $product) {}

    public function calculatePrice(int $quantity, float $regularPrice): float
    {
        $priceRule = $this->product->getPriceRule();

        $specialPriceGroups = floor($quantity / $priceRule->getQuantity());

        $remainingItems = $quantity % $priceRule->getQuantity();

        return $specialPriceGroups * $priceRule->getAmount() + $remainingItems * $regularPrice;
    }
}
