<?php

declare(strict_types=1);

namespace App\Domain\Contracts;

interface PriceRuleContract
{
    public function calculatePrice(int $quantity): float;
}