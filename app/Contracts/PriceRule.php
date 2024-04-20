<?php

declare(strict_types=1);

namespace App\Contracts;

interface PriceRule
{
    public function calculatePrice(int $quantity, float $regularPrice): float;
}
