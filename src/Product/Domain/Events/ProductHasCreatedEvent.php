<?php

declare(strict_types=1);

namespace EasyBell\Product\Domain\Events;

use EasyBell\Product\Domain\ProductId;
use EasyBell\Product\Domain\ProductName;
use EasyBell\Product\Domain\ProductPrice;
use EasyBell\Shared\Domain\Bus\Event\DomainEvent;

class ProductHasCreatedEvent extends DomainEvent
{
    public function __construct(
        ProductId $aggregateId,
        private readonly ProductName $name,
        private readonly ProductPrice $price,
        ?string $eventId = null,
        ?\DateTime $createdAt = null,
    ) {
        parent::__construct($aggregateId->value(), $eventId, $createdAt);
    }

    /**
     * @param array{'name': ProductName, 'price': ProductPrice} $payload
     */
    public static function create(string $aggregateId, array $payload, string $eventId, \DateTime $createdAt): self
    {
        return new self(new ProductId($aggregateId), $payload['name'], $payload['price'], $eventId, $createdAt);
    }

    public static function eventName(): string
    {
        return 'product.created';
    }

    /**
     * @return array{'name': string, 'price': float}
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name->value(),
            'price' => $this->price->value(),
        ];
    }
}
