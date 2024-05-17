<?php

declare(strict_types=1);

namespace App\Domain\PriceRule;

use App\Domain\Contracts\PriceRuleContract;
use App\Domain\Entities\Product;
use App\Domain\Entities\SpecialProduct;

class PriceRuleFactory
{
    public function getRule(Product $product): PriceRuleContract
    {
        return match ($product::class) {
            SpecialProduct::class => new SpecialPriceStrategyContract($product),
            default => new NormalPriceStrategyContract($product),
        };
    }
}
