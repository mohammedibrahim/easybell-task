<?php

declare(strict_types=1);

namespace EasyBell\Checkout\Application;

use EasyBell\Product\Application\ProductService;

final class Checkout
{
    public function __construct(
        protected readonly ProductService $productService,
        protected readonly CartService $cart,
    ) {}

    public function scan(string $productName): void
    {
        $product = $this->productService->get($productName);

        $this->cart->add($product);
    }

    public function total(): float
    {
        return $this->cart->calculateCartTotal();
    }
}
