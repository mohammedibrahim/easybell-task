<?php

declare(strict_types=1);

namespace EasyBell\Checkout\Application;

use EasyBell\Checkout\Domain\ValueObject\CartItem;
use EasyBell\Product\Domain\Product;
use EasyBell\Shared\Domain\Collection\Contracts\CollectionContract;

final readonly class CartService
{
    /**
     * @param CollectionContract<int, CartItem> $items
     */
    public function __construct(private CollectionContract $items) {}

    public function add(Product $product): void
    {
        if ($this->checkExist($product)) {
            $this->overrideQuantity($product);
        } else {
            $this->addItem($product);
        }
    }

    public function overrideQuantity(Product $product): void
    {
        $item = $this->items->filterItems(fn ($item) => $item->getProductName() === $product->getName());

        $offset = $item->mapItem(fn ($i, $index) => $index)->firstItem();

        $itemData = $item->firstItem();

        $this->items->removeItems([$offset]);

        $this->addItem($product, $itemData->getQuantity() + 1);
    }

    public function addItem(Product $product, int $quantity = 1): void
    {
        $this->items->addItem(new CartItem(
            $product->getName(),
            $product->calculatePrice($quantity),
            $quantity,
        ));
    }

    /**
     * @return CollectionContract<int, CartItem>
     */
    public function getCartItems(): CollectionContract
    {
        return $this->items;
    }

    public function calculateCartTotal(): float
    {
        $total = 0;

        foreach ($this->getCartItems() as $cartItem) {
            $total += $cartItem->getPrice();
        }

        return $total;
    }

    private function checkExist(Product $product): bool
    {
        return (bool) $this
            ->items
            ->filterItems(fn ($item) => $item->getProductName() === $product->getName())->firstItem()
        ;
    }
}
