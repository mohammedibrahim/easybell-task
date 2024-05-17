<?php

declare(strict_types=1);

namespace App\Domain\PriceRule;

use App\Domain\Contracts\PriceRuleContract;
use App\Domain\Contracts\ProductRegularPriceAware;

class NormalPriceStrategy implements PriceRuleContract
{
    public function __construct(protected readonly ProductRegularPriceAware $product) {}

    public function calculatePrice(int $quantity): float
    {
        return $quantity * $this->product->getPrice();
    }
}
