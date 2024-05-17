<?php

namespace App\Domain\Contracts;

use App\Domain\ValueObject\ProductQuantityPriceRule;

interface ProductRegularPriceAware
{
    public function getPrice(): float;
}
