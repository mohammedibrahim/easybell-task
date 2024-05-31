<?php

declare(strict_types=1);

namespace EasyBell\Product\Application\Filter;

use EasyBell\Shared\Domain\Criteria\Filters;
use EasyBell\Shared\Domain\Criteria\Order;
use EasyBell\Shared\Domain\Bus\Query\QueryHandler;

class FilterProductQueryHandler implements QueryHandler
{
    public function __construct(private readonly ProductFilter $filter) {}

    public function __invoke(FilterProductQuery $query): FilterProductResponse
    {
        $filters = Filters::fromValues($query->getFilters());
        $order = Order::fromValues($query->getOrderBy(), $query->getOrder());

        $result = $this->filter->filter($filters, $order, $query->getLimit(), $query->getOffset());

        return new FilterProductResponse($result);
    }
}
