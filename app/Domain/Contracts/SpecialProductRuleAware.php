<?php

namespace App\Domain\Contracts;

use App\Domain\ValueObject\ProductQuantityPriceRule;

interface SpecialProductRuleAware
{
    public function getPriceRule(): ProductQuantityPriceRule;
}
