<?php

declare(strict_types=1);

namespace App\Domain\PriceRule;

use App\Domain\Contracts\PriceRule;

class NormalPriceStrategy implements PriceRule
{
    public function calculatePrice(int $quantity, float $regularPrice): float
    {
        return $quantity * $regularPrice;
    }
}
