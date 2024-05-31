<?php

namespace EasyBell\Shared\Infrastructure\Bus\Event;

use EasyBell\Shared\Domain\Bus\Event\DomainEvent;
use EasyBell\Shared\Domain\Bus\Event\DomainEventSubscriber;
use EasyBell\Shared\Domain\Bus\Event\EventBus;
use EasyBell\Shared\Infrastructure\Bus\CallableFirstParameterExtractor;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;

class SymfonyInMemoryDomainEventBus implements EventBus
{
    private readonly MessageBus $bus;

    /**
     * @param DomainEventSubscriber[] $subscribers
     */
    public function __construct(iterable $subscribers)
    {
        $this->bus = new MessageBus(
            [
                new HandleMessageMiddleware(
                    new HandlersLocator(CallableFirstParameterExtractor::forPipedCallables($subscribers))
                ),
            ]
        );
    }

    public function publish(DomainEvent ...$events): void
    {
        foreach ($events as $event) {
            try {
                $this->bus->dispatch($event);
            } catch (NoHandlerForMessageException) {
            }
        }
    }
}