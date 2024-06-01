<?php

declare(strict_types=1);

namespace EasyBell\Checkout\Domain\Contracts;

use EasyBell\Checkout\Domain\CartTotalPrice;
use EasyBell\Checkout\Domain\Product;

interface CartRepositoryContract
{
    public function overrideQuantity(Product $product, int $quantity = 1): void;

    public function addItem(Product $product, int $quantity = 1): void;

    public function removeItem(Product $product): void;

    public function calculateCartTotal(): CartTotalPrice;

    public function checkExist(Product $product): bool;
}
