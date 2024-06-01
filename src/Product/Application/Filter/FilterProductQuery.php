<?php

declare(strict_types=1);

namespace EasyBell\Product\Application\Filter;

use EasyBell\Shared\Domain\Bus\Query\Query;

readonly class FilterProductQuery implements Query
{
    public function __construct(
        private array $filters,
        private ?string $orderBy,
        private ?string $order,
        private ?int $limit,
        private ?int $offset
    ) {}

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function getOrderBy(): ?string
    {
        return $this->orderBy;
    }

    public function getOrder(): ?string
    {
        return $this->order;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }
}
