<?php

declare(strict_types=1);

namespace EasyBell\Shared\Domain\Bus\Event;

use Ramsey\Uuid\Uuid;

abstract class DomainEvent
{
    private readonly string $eventId;
    private readonly \DateTime $createdAt;

    public function __construct(private readonly string $aggregateId, ?string $eventId = null, ?\DateTime $createdAt = null)
    {
        $this->eventId = $eventId ?? Uuid::uuid4()->toString();
        $this->createdAt = $createdAt ?? new \DateTime();
    }

    /**
     * @param string[] $payload
     */
    abstract public static function create(string $aggregateId, array $payload, string $eventId, \DateTime $occurredOn): self;

    abstract public static function eventName(): string;

    /**
     * @return array
     */
    abstract public function toArray(): array;

    public function getEventId(): string
    {
        return $this->eventId;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getAggregateId(): string
    {
        return $this->aggregateId;
    }
}
