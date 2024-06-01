<?php

declare(strict_types=1);

namespace EasyBell\Apps\Shop\Controller\Product;

use EasyBell\Product\Application\Filter\FilterProductQuery;
use EasyBell\Product\Application\Filter\FilterProductResponse;
use EasyBell\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FilterController extends AbstractController
{
    public function __construct(private readonly QueryBus $bus) {}

    #[Route('/product/filter', name: 'product_filter', methods: ['GET'])]
    public function filter(Request $request): JsonResponse
    {
        $orderBy = $request->query->get('order_by');
        $order = $request->query->get('order');
        $limit = $request->query->get('limit');
        $offset = $request->query->get('offset');

        /** @var FilterProductResponse $response */
        $response = $this->bus->ask(new FilterProductQuery(
            (array) ($request->query->all()['filters'] ?? []),
            (string) $orderBy,
            (string) $order,
            $limit === null ? null : (int) $limit,
            $offset === null ? null : (int) $offset
        ));

        $arrResponse = [];

        foreach ($response->getProducts() as $product) {
            $arrResponse[] = $product->toArray();
        }

        return new JsonResponse($arrResponse);
    }
}
