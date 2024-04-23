<?php

declare(strict_types=1);

namespace App\PriceRule;

use App\Contracts\PriceRule;
use App\ValueObject\ProductQuantityPriceRule;

class PriceRuleFactory
{
    public function getRule(?ProductQuantityPriceRule $productPriceRule): PriceRule
    {
        if (!is_null($productPriceRule)) {
            return new SpecialPriceStrategy($productPriceRule);
        }

        return new NormalPriceStrategy();
    }
}
