<?php

declare(strict_types=1);

namespace App\Domain\PriceRule;

use App\Domain\Contracts\PriceRule;
use App\Domain\Contracts\ProductRegularPriceAware;

class NormalPriceStrategy implements PriceRule
{
    public function __construct(protected readonly ProductRegularPriceAware $product) {}

    public function calculatePrice(int $quantity): float
    {
        return $quantity * $this->product->getPrice();
    }
}
