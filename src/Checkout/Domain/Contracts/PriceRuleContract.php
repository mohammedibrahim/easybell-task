<?php

declare(strict_types=1);

namespace EasyBell\Checkout\Domain\Contracts;

interface PriceRuleContract
{
    public function calculatePrice(int $quantity): float;
}
