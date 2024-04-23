<?php

declare(strict_types=1);

namespace App;

readonly class Checkout
{
    public function __construct(
        private ProductService $productService,
        private Cart $cart,
    ) {}

    public function scan(string $productName): void
    {
        $product = $this->withName($productName);

        if (!$product) {
            throw new \Exception(sprintf('Product %s not found!', $productName));
        }

        $this->cart->add($product);
    }

    public function total(): float
    {
        $total = 0;

        foreach ($this->cart->getCartItems() as $cartItem) {
            $total += $cartItem->getPrice();
        }

        return $total;
    }

    private function withName(string $name): mixed
    {
        return $this->productService->list()->filterItems(fn ($item) => $item->getName() === $name)->firstItem();
    }
}
