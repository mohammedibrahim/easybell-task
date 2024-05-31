<?php

declare(strict_types=1);

namespace EasyBell\Product\Application\Create;

use EasyBell\Product\Domain\ProductName;
use EasyBell\Product\Domain\ProductPrice;
use EasyBell\Shared\Domain\Bus\Command\CommandHandler;

class PostProductCommandHandler implements CommandHandler
{
    public function __construct(private readonly ProductCreator $creator) {}

    public function __invoke(PostProductCommand $command): void
    {
        $name = new ProductName($command->getProductName());
        $price = new ProductPrice($command->getPrice());

        $this->creator->create($name, $price);
    }
}
