<?php

declare(strict_types=1);

namespace App\PriceRule;

use App\Contracts\PriceRule;
use App\ValueObject\ProductQuantityPriceRule;

class PriceRuleFactory
{
    public function create(?ProductQuantityPriceRule $productPriceRule): PriceRule
    {
        if (!is_null($productPriceRule)) {
            return new SpecialPrice($productPriceRule);
        }

        return new NormalPrice();
    }
}
