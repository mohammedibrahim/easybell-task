<?php

declare(strict_types=1);

namespace App\Domain\PriceRule;

use App\Domain\Contracts\PriceRule;
use App\Domain\Entities\Product;
use App\Domain\Entities\SpecialProduct;

class PriceRuleFactory
{
    public function getRule(Product $product): PriceRule
    {
        return match ($product::class) {
            SpecialProduct::class => new SpecialPriceStrategy($product),
            default => new NormalPriceStrategy($product),
        };
    }
}
