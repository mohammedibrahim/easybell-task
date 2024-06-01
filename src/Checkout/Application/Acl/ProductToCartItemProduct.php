<?php

declare(strict_types=1);

namespace EasyBell\Checkout\Application\Acl;

use EasyBell\Checkout\Domain\Product as CheckoutDomainProduct;
use EasyBell\Checkout\Domain\ProductId;
use EasyBell\Checkout\Domain\ProductName;
use EasyBell\Checkout\Domain\ProductPrice;
use EasyBell\Checkout\Domain\SpecialProduct as CheckoutDomainSpecialProduct;
use EasyBell\Checkout\Domain\SpecialProductPrice;
use EasyBell\Checkout\Domain\SpecialProductQuantity;
use EasyBell\Product\Domain\Product as ProductDomainProduct;
use EasyBell\Product\Domain\SpecialProduct;
use EasyBell\Product\Domain\SpecialProduct as ProductDomainSpecialProduct;

class ProductToCartItemProduct
{
    public static function translate(ProductDomainProduct $productDomainProduct): CheckoutDomainProduct
    {
        return match ($productDomainProduct::class) {
            SpecialProduct::class => self::createSpecialProduct($productDomainProduct),
            default => self::createSimpleProduct($productDomainProduct),
        };
    }

    private static function createSimpleProduct(ProductDomainProduct $productDomainProduct): CheckoutDomainProduct
    {
        return CheckoutDomainProduct::create(
            new ProductId($productDomainProduct->getProductId()->value()),
            new ProductName($productDomainProduct->getName()->value()),
            new ProductPrice($productDomainProduct->getPrice()->value()),
        );
    }

    private static function createSpecialProduct(ProductDomainSpecialProduct $productDomainProduct): CheckoutDomainSpecialProduct
    {
        return CheckoutDomainSpecialProduct::createSpecialProduct(
            new ProductId($productDomainProduct->getProductId()->value()),
            new ProductName($productDomainProduct->getName()->value()),
            new ProductPrice($productDomainProduct->getPrice()->value()),
            new SpecialProductQuantity($productDomainProduct->getPriceRule()->getQuantity()->value()),
            new SpecialProductPrice($productDomainProduct->getPriceRule()->getPrice()->value()),
        );
    }
}
