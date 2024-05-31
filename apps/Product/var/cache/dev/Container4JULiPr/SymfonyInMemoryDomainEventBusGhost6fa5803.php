<?php

namespace Container4JULiPr;
include_once \dirname(__DIR__, 6).'/src/Shared/Domain/Bus/Event/EventBus.php';
include_once \dirname(__DIR__, 6).'/src/Shared/Infrastructure/Bus/Event/SymfonyInMemoryDomainEventBus.php';

class SymfonyInMemoryDomainEventBusGhost6fa5803 extends \EasyBell\Shared\Infrastructure\Bus\Event\SymfonyInMemoryDomainEventBus implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'bus' => [parent::class, 'bus', parent::class],
        'bus' => [parent::class, 'bus', parent::class],
    ];
}

// Help opcache.preload discover always-needed symbols
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('SymfonyInMemoryDomainEventBusGhost6fa5803', false)) {
    \class_alias(__NAMESPACE__.'\\SymfonyInMemoryDomainEventBusGhost6fa5803', 'SymfonyInMemoryDomainEventBusGhost6fa5803', false);
}
