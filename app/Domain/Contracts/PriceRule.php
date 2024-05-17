<?php

declare(strict_types=1);

namespace App\Domain\Contracts;

interface PriceRule
{
    public function calculatePrice(int $quantity, float $regularPrice): float;
}
