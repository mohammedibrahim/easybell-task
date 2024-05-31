<?php

declare(strict_types=1);

namespace EasyBell\Product\Domain\PriceRule;

use EasyBell\Checkout\Domain\Contracts\PriceRuleContract;
use EasyBell\Checkout\Domain\Contracts\ProductRegularPriceAndSpecialRuleAware;

class SpecialPriceStrategy implements PriceRuleContract
{
    public function __construct(protected readonly ProductRegularPriceAndSpecialRuleAware $product) {}

    public function calculatePrice(int $quantity): float
    {
        $priceRule = $this->product->getPriceRule();

        $specialPriceGroups = floor($quantity / $priceRule->getQuantity());

        $remainingItems = $quantity % $priceRule->getQuantity();

        return $specialPriceGroups * $priceRule->getPrice() + $remainingItems * $this->product->getPrice()->value();
    }
}
