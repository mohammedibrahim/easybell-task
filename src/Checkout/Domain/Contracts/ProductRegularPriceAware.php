<?php

namespace EasyBell\Checkout\Domain\Contracts;

use EasyBell\Checkout\Domain\ProductPrice;

interface ProductRegularPriceAware
{
    public function getPrice(): ProductPrice;
}
