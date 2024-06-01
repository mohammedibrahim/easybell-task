<?php

declare(strict_types=1);

namespace EasyBell\Checkout\Application\Total;

use EasyBell\Checkout\Domain\Contracts\CartRepositoryContract;

final class CartTotal
{
    public function __construct(
        protected readonly CartRepositoryContract $cartRepository,
    ) {}

    public function total(): CartTotalResponse
    {
        return new CartTotalResponse($this->cartRepository->calculateCartTotal());
    }
}
