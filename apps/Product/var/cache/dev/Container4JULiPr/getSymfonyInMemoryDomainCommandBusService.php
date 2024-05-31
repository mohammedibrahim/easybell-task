<?php

namespace Container4JULiPr;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSymfonyInMemoryDomainCommandBusService extends EasyBell_Apps_Product_ProductKernelDevDebugContainer
{
    /**
     * Gets the private 'EasyBell\Shared\Infrastructure\Bus\Command\SymfonyInMemoryDomainCommandBus' shared autowired service.
     *
     * @return \EasyBell\Shared\Infrastructure\Bus\Command\SymfonyInMemoryDomainCommandBus
     */
    public static function do($container, $lazyLoad = true)
    {
        if (true === $lazyLoad) {
            return $container->privates['EasyBell\\Shared\\Infrastructure\\Bus\\Command\\SymfonyInMemoryDomainCommandBus'] = $container->createProxy('SymfonyInMemoryDomainCommandBusGhost66eb413', static fn () => \SymfonyInMemoryDomainCommandBusGhost66eb413::createLazyGhost(static fn ($proxy) => self::do($container, $proxy)));
        }

        include_once \dirname(__DIR__, 6).'/src/Shared/Domain/Bus/Command/CommandBus.php';
        include_once \dirname(__DIR__, 6).'/src/Shared/Infrastructure/Bus/Command/SymfonyInMemoryDomainCommandBus.php';

        return ($lazyLoad->__construct(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['EasyBell\\Product\\Application\\Create\\PostProductCommandHandler'] ?? $container->load('getPostProductCommandHandlerService'));
            yield 1 => ($container->privates['EasyBell\\Product\\Application\\Create\\PostSpecialProductCommandHandler'] ?? $container->load('getPostSpecialProductCommandHandlerService'));
        }, 2)) && false ?: $lazyLoad);
    }
}