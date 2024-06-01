<?php

declare(strict_types=1);

namespace EasyBell\Apps\Shop\Controller\Checkout;

use EasyBell\Checkout\Application\Total\CartTotal;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CartTotalController extends AbstractController
{
    public function __construct(private readonly CartTotal $cartTotal) {}

    #[Route('/checkout/total', name: 'checkout_total')]
    public function total(Request $request): JsonResponse
    {
        return new JsonResponse(['total' => $this->cartTotal->total()->getTotal()]);
    }
}
