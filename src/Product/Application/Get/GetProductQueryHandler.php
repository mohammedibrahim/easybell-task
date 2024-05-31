<?php

declare(strict_types=1);

namespace EasyBell\Product\Application\Get;

use EasyBell\Shared\Domain\Bus\Query\QueryHandler;

class GetProductQueryHandler implements QueryHandler
{
    public function __construct(private readonly ProductGetter $getter) {}

    public function __invoke(GetProductQuery $query): GetProductResponse
    {
        $product = $this->getter->get($query->getProductId());

        return new GetProductResponse($product);
    }
}
