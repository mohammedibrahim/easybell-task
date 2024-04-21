<?php

declare(strict_types=1);

namespace App;

use App\Contracts\CollectionContract;

readonly class Checkout
{
    /**
     * @param CollectionContract<int, Product> $products
     */
    public function __construct(
        private CollectionContract $products,
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
        return $this->products->filterItems(fn ($item) => $item->getName() === $name)->firstItem();
    }
}
