<?php

declare(strict_types=1);

namespace App;

use App\Contracts\CollectionContract;

final readonly class Cart
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
        $item = $this->items->filterItems(fn ($item) => $item->getName() === $product->getName());

        $offset = $item->mapItem(fn ($i, $index) => $index)->firstItem();

        $itemData = $item->firstItem();

        $this->items->removeItems([$offset]);

        $this->addItem($product, $itemData->getQuantity() + 1);
    }

    public function addItem(Product $product, int $quantity = 1): void
    {
        $this->items->addItem(new CartItem(
            $product->getName(),
            $product->getPrice($quantity),
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

    private function withName(string $name): mixed
    {
        return $this->items->filterItems(fn ($item) => $item->getName() === $name)->firstItem();
    }

    private function checkExist(Product $product): bool
    {
        $itemName = $product->getName();

        return (bool) $this->withName($itemName);
    }
}
