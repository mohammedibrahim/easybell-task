<?php

declare(strict_types=1);

namespace EasyBell\Product\Application\Get;

use EasyBell\Product\Domain\Contracts\ProductRepositoryContract;
use EasyBell\Product\Domain\Exceptions\ProductException;
use EasyBell\Product\Domain\Product;
use EasyBell\Product\Domain\ProductId;

final class ProductGetter
{
    public function __construct(
        protected readonly ProductRepositoryContract $repository,
    ) {}

    public function get(string $productId): Product
    {
        $product = $this->repository->get(new ProductId($productId));

        if (!$product) {
            throw ProductException::productNotFound($productId);
        }

        return $product;
    }
}
