<?php

declare(strict_types=1);

namespace App\Application;

class Checkout
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
