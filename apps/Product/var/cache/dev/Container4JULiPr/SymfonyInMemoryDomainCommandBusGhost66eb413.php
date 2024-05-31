<?php

namespace Container4JULiPr;
include_once \dirname(__DIR__, 6).'/src/Shared/Domain/Bus/Command/CommandBus.php';
include_once \dirname(__DIR__, 6).'/src/Shared/Infrastructure/Bus/Command/SymfonyInMemoryDomainCommandBus.php';

class SymfonyInMemoryDomainCommandBusGhost66eb413 extends \EasyBell\Shared\Infrastructure\Bus\Command\SymfonyInMemoryDomainCommandBus implements \Symfony\Component\VarExporter\LazyObjectInterface
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

if (!\class_exists('SymfonyInMemoryDomainCommandBusGhost66eb413', false)) {
    \class_alias(__NAMESPACE__.'\\SymfonyInMemoryDomainCommandBusGhost66eb413', 'SymfonyInMemoryDomainCommandBusGhost66eb413', false);
}