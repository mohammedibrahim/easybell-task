<?php

declare(strict_types=1);

namespace EasyBell\Checkout\Domain;

use EasyBell\Shared\Domain\Aggregate\AggregateRoot;

class CartItem extends AggregateRoot
{
    public function __construct(
        protected CartId $cartId,
        protected Product $product,
        protected CartItemPrice $price,
        protected CartItemQuantity $quantity,
    ) {}

    public static function create(Product $product, CartItemPrice $price, CartItemQuantity $quantity): self
    {
        return new self(CartId::random(), $product, $price, $quantity);
    }

    public function getCartId(): CartId
    {
        return $this->cartId;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getPrice(): CartItemPrice
    {
        return $this->price;
    }

    public function getQuantity(): CartItemQuantity
    {
        return $this->quantity;
    }
}
