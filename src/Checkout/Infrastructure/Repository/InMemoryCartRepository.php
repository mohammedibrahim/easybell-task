<?php

declare(strict_types=1);

namespace EasyBell\Checkout\Infrastructure\Repository;

use EasyBell\Checkout\Domain\CartItem;
use EasyBell\Checkout\Domain\CartItemPrice;
use EasyBell\Checkout\Domain\CartItemQuantity;
use EasyBell\Checkout\Domain\CartTotalPrice;
use EasyBell\Checkout\Domain\Contracts\CartRepositoryContract;
use EasyBell\Checkout\Domain\Product;
use EasyBell\Shared\Domain\Collection\CollectionContract;
use EasyBell\Shared\Infrastructure\Collection\Collection;

final readonly class InMemoryCartRepository implements CartRepositoryContract
{
    /**
     * @var CollectionContract<int, CartItem>
     */
    private CollectionContract $items;

    public function __construct(
    ) {
        $this->items = new Collection();
    }

    public function overrideQuantity(Product $product, int $quantity = 1): void
    {
        $item = $this->items->filterItems(fn ($item) => $item->getProduct()->getName()->value() === $product->getName()->value());

        $offset = $item->mapItem(fn ($i, $index) => $index)->firstItem();

        $itemData = $item->firstItem();

        $this->items->removeItems([$offset]);

        $this->addItem($product, $itemData->getQuantity()->value() + $quantity);
    }

    public function addItem(Product $product, int $quantity = 1): void
    {
        $this->items->addItem(CartItem::create(
            $product,
            new CartItemPrice($product->calculatePrice($quantity)),
            new CartItemQuantity($quantity),
        ));
    }

    public function removeItem(Product $product): void
    {
        if (!$this->checkExist($product)) {
            return;
        }

        $offset = $this->items
            ->filterItems(fn ($item) => $item->getProduct()->getName()->value() === $product->getName()->value())
            ->mapItem(fn ($i, $index) => $index)->firstItem()
        ;

        $this->items->removeItems([$offset]);
    }

    /**
     * @return CollectionContract<int, CartItem>
     */
    public function getCartItems(): CollectionContract
    {
        return $this->items;
    }

    public function calculateCartTotal(): CartTotalPrice
    {
        $total = 0;

        foreach ($this->getCartItems() as $cartItem) {
            $total += $cartItem->getPrice()->value();
        }

        return new CartTotalPrice($total);
    }

    public function checkExist(Product $product): bool
    {
        return (bool) $this
            ->items
            ->filterItems(fn ($item) => $item->getProduct()->getName()->value() === $product->getName()->value())
            ->firstItem()
        ;
    }
}
