<?php

declare(strict_types=1);

namespace EasyBell\Product\Application\Create;

use EasyBell\Product\Domain\ProductName;
use EasyBell\Product\Domain\ProductPrice;
use EasyBell\Product\Domain\ProductQuantityPriceRule;
use EasyBell\Product\Domain\SpecialProductPrice;
use EasyBell\Product\Domain\SpecialProductQuantity;
use EasyBell\Shared\Domain\Bus\Command\CommandHandler;

class PostSpecialProductCommandHandler implements CommandHandler
{
    public function __construct(private readonly ProductCreator $creator) {}

    public function __invoke(PostSpecialProductCommand $command): void
    {
        $name = new ProductName($command->getProductName());
        $price = new ProductPrice($command->getPrice());
        $specialQuantity = new SpecialProductQuantity($command->getQuantity());
        $specialPrice = new SpecialProductPrice($command->getSpecialPrice());

        $this->creator->createSpecialProduct($name, $price, $specialQuantity, $specialPrice);
    }
}
