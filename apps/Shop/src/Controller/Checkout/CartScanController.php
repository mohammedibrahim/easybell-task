<?php

declare(strict_types=1);

namespace EasyBell\Apps\Shop\Controller\Checkout;

use EasyBell\Checkout\Application\Scan\CartScan;
use EasyBell\Checkout\Application\Total\CartTotal;
use EasyBell\Checkout\Domain\Exceptions\CheckoutException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CartScanController extends AbstractController
{
    public function __construct(private readonly CartScan $cartScan, private readonly CartTotal $cartTotal) {}

    #[Route('/checkout/scan/{product_name}', name: 'checkout_scan')]
    public function scan(Request $request): JsonResponse
    {
        try {
            $this->cartScan->scan($request->get('product_name'));

            return new JsonResponse(['total' => $this->cartTotal->total()->getTotal()]);
        } catch (CheckoutException $exception) {
            return new JsonResponse(['error' => $exception->getMessage()], $exception->getCode());
        }
    }
}
