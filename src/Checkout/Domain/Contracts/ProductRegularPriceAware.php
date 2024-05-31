<?php

namespace EasyBell\Checkout\Domain\Contracts;

use EasyBell\Product\Domain\ProductPrice;

interface ProductRegularPriceAware
{
    public function getPrice(): ProductPrice;
}
