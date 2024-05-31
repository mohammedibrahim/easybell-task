<?php

namespace EasyBell\Checkout\Domain\Contracts;

use EasyBell\Product\Domain\ProductQuantityPriceRule;

interface SpecialProductRuleAware
{
    public function getPriceRule(): ProductQuantityPriceRule;
}
