<?php

declare(strict_types=1);

namespace EasyBell\Product\Domain\PriceRule;

use EasyBell\Checkout\Domain\Contracts\PriceRuleContract;
use EasyBell\Product\Domain\Product;
use EasyBell\Product\Domain\SpecialProduct;

class PriceRuleFactory
{
    public function getRule(Product $product): PriceRuleContract
    {
        return match ($product::class) {
            SpecialProduct::class => new SpecialPriceStrategy($product),
            default => new NormalPriceStrategy($product),
        };
    }
}
