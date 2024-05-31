<?php

declare(strict_types=1);

namespace EasyBell\Product\Application\Filter;

use EasyBell\Product\Domain\Contracts\ProductRepositoryContract;
use EasyBell\Shared\Domain\Collection\Contracts\CollectionContract;
use EasyBell\Shared\Domain\Criteria\Criteria;
use EasyBell\Shared\Domain\Criteria\Filters;
use EasyBell\Shared\Domain\Criteria\Order;

final class ProductFilter
{
    public function __construct(
        protected readonly ProductRepositoryContract $repository,
    ) {}

    public function filter(Filters $filters, Order $order, ?int $limit, ?int $offset): CollectionContract
    {
        $criteria = new Criteria($filters, $order, $offset, $limit);

        return $this->repository->filter($criteria);
    }
}
