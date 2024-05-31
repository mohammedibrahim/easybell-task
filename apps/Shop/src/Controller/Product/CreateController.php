<?php

declare(strict_types=1);

namespace EasyBell\Apps\Shop\Controller\Product;

use EasyBell\Product\Application\Create\PostProductCommand;
use EasyBell\Product\Application\Create\PostSpecialProductCommand;
use EasyBell\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CreateController extends AbstractController
{
    public function __construct(private readonly CommandBus $bus) {}

    #[Route('/product/create', name: 'product_post', methods: ['POST'])]
    public function post(Request $request): JsonResponse
    {
        $content = json_decode($request->getContent(), true);

        $name = $content['name'] ?? '';

        $price = $content['price'] ?? 0;

        $specialProduct = $content['specialProduct'] ?? [];

        if ($specialProduct) {
            $quantity = $specialProduct['quantity'] ?? 0;
            $amount = $specialProduct['amount'] ?? 0;
            $this->bus->dispatch(new PostSpecialProductCommand($name, $price, $quantity, $amount));
        } else {
            $this->bus->dispatch(new PostProductCommand($name, $price));
        }

        return new JsonResponse('Product created!');
    }
}
