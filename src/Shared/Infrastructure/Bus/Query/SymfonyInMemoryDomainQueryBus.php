<?php

declare(strict_types=1);

namespace EasyBell\Shared\Infrastructure\Bus\Query;

use EasyBell\Shared\Domain\Bus\Query\Query;
use EasyBell\Shared\Domain\Bus\Query\QueryBus;
use EasyBell\Shared\Domain\Bus\Query\QueryHandler;
use EasyBell\Shared\Domain\Bus\Query\Response;
use EasyBell\Shared\Infrastructure\Bus\CallableFirstParameterExtractor;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class SymfonyInMemoryDomainQueryBus implements QueryBus
{
    private readonly MessageBus $bus;

    /**
     * @param QueryHandler[] $queryHandlers
     */
    public function __construct(iterable $queryHandlers)
    {
        $this->bus = new MessageBus(
            [
                new HandleMessageMiddleware(
                    new HandlersLocator(CallableFirstParameterExtractor::forCallables($queryHandlers))
                ),
            ]
        );
    }

    public function ask(Query $query): ?Response
    {
        try {
            /** @var HandledStamp $stamp */
            $stamp = $this->bus->dispatch($query)->last(HandledStamp::class);

            return $stamp->getResult();
        } catch (NoHandlerForMessageException) {
            throw new QueryNotRegisteredError($query);
        } catch (HandlerFailedException $t) {
            if ($t->getPrevious()) {
                throw $t->getPrevious();
            }

            throw $t;
        }
    }
}
