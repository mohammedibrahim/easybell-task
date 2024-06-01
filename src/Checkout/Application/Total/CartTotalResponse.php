<?php

declare(strict_types=1);

namespace EasyBell\Checkout\Application\Total;

use EasyBell\Checkout\Domain\CartTotalPrice;
use EasyBell\Shared\Domain\Bus\Query\Response;

final readonly class CartTotalResponse implements Response
{
    public function __construct(private CartTotalPrice $total) {}

    public function getTotal(): float
    {
        return $this->total->value();
    }
}
