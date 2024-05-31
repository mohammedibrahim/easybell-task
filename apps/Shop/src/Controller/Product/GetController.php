<?php

declare(strict_types=1);

namespace EasyBell\Apps\Shop\Controller\Product;

use EasyBell\Product\Application\Get\GetProductResponse;
use EasyBell\Product\Application\Get\GetProductQuery;
use EasyBell\Product\Domain\Exceptions\ProductException;
use EasyBell\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GetController extends AbstractController
{
    public function __construct(private readonly QueryBus $bus) {}

    #[Route('/product/get/{name}', name: 'product_get')]
    public function get(Request $request): JsonResponse
    {
        try {
            /** @var GetProductResponse $response */
            $response = $this->bus->ask(new GetProductQuery($request->get('name')));

            return new JsonResponse($response->getProduct()->toArray());
        } catch (ProductException $exception) {
            return new JsonResponse(['error' => $exception->getMessage()], $exception->getCode());
        }
    }
}
