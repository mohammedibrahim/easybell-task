<?php

namespace EasyBell\Checkout\Domain\Contracts;

use EasyBell\Checkout\Domain\ProductQuantityPriceRule;

interface SpecialProductRuleAware
{
    public function getPriceRule(): ProductQuantityPriceRule;
}
