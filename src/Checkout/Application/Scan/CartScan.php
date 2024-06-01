<?php

declare(strict_types=1);

namespace EasyBell\Checkout\Application\Scan;

use EasyBell\Checkout\Application\Acl\ProductToCartItemProduct;
use EasyBell\Checkout\Domain\Contracts\CartRepositoryContract;
use EasyBell\Checkout\Domain\Exceptions\CheckoutException;
use EasyBell\Product\Application\Filter\ProductFilter;
use EasyBell\Shared\Domain\Criteria\Filters;
use EasyBell\Shared\Domain\Criteria\Order;

final class CartScan
{
    public function __construct(
        protected readonly ProductFilter $productFilter,
        protected readonly CartRepositoryContract $cartRepository,
    ) {}

    public function scan(string $productName): void
    {

        $filters = Filters::fromValues([[
            'field' => 'name.value',
            'value' => $productName,
            'operator' => '=',
        ]]);

        $order = Order::fromValues(null, null);

        $product = $this->productFilter->filter($filters, $order, null, null)->firstItem();

        if (!$product) {
            throw CheckoutException::productNotFound($productName);
        }

        $cartProduct = ProductToCartItemProduct::translate($product);

        if ($this->cartRepository->checkExist($cartProduct)) {
            $this->cartRepository->overrideQuantity($cartProduct);
        } else {
            $this->cartRepository->addItem($cartProduct);
        }
    }
}
