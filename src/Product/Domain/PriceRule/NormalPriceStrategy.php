<?php

declare(strict_types=1);

namespace EasyBell\Product\Domain\PriceRule;

use EasyBell\Checkout\Domain\Contracts\PriceRuleContract;
use EasyBell\Checkout\Domain\Contracts\ProductRegularPriceAware;

class NormalPriceStrategy implements PriceRuleContract
{
    public function __construct(protected readonly ProductRegularPriceAware $product) {}

    public function calculatePrice(int $quantity): float
    {
        return $quantity * $this->product->getPrice()->value();
    }
}
