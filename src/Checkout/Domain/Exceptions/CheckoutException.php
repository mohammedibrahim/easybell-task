<?php

namespace EasyBell\Checkout\Domain\Exceptions;

class CheckoutException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function productNotFound(string $productName): CheckoutException
    {
        return new self(sprintf('Product with name %s not found.', $productName), 404);
    }
}
