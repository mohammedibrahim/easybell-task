<?php

declare(strict_types=1);

namespace App\Domain\PriceRule;

use App\Domain\Contracts\PriceRule;
use App\Domain\Contracts\ProductRegularPriceAndSpecialRuleAware;

class SpecialPriceStrategy implements PriceRule
{
    public function __construct(protected readonly ProductRegularPriceAndSpecialRuleAware $product) {}

    public function calculatePrice(int $quantity): float
    {
        $priceRule = $this->product->getPriceRule();

        $specialPriceGroups = floor($quantity / $priceRule->getQuantity());

        $remainingItems = $quantity % $priceRule->getQuantity();

        return $specialPriceGroups * $priceRule->getAmount() + $remainingItems * $this->product->getPrice();
    }
}
