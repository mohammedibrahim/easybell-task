<?php

namespace EasyBell\Shared\Infrastructure\Bus\Command;

use EasyBell\Shared\Domain\Bus\Command\Command;
use EasyBell\Shared\Domain\Bus\Command\CommandBus;
use EasyBell\Shared\Domain\Bus\Command\CommandHandler;
use EasyBell\Shared\Infrastructure\Bus\CallableFirstParameterExtractor;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;

class SymfonyInMemoryDomainCommandBus implements CommandBus
{
    private readonly MessageBus $bus;

    /**
     * @param CommandHandler[] $commandHandlers
     */
    public function __construct(iterable $commandHandlers)
    {
        $this->bus = new MessageBus(
            [
                new HandleMessageMiddleware(
                    new HandlersLocator(CallableFirstParameterExtractor::forCallables($commandHandlers))
                ),
            ]
        );
    }

    public function dispatch(Command $command): void
    {
        try {
            $this->bus->dispatch($command);
        } catch (NoHandlerForMessageException) {
            throw new CommandNotRegisteredError($command);
        } catch (HandlerFailedException $error) {
            throw $error->getPrevious() ?? $error;
        }
    }
}
