<?php

namespace Container4JULiPr;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCache_SystemService extends EasyBell_Apps_Product_ProductKernelDevDebugContainer
{
    /**
     * Gets the public 'cache.system' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 6).'/vendor/psr/cache/src/CacheItemPoolInterface.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/cache/Adapter/AdapterInterface.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/cache-contracts/CacheInterface.php';
        include_once \dirname(__DIR__, 6).'/vendor/psr/log/src/LoggerAwareInterface.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/cache/ResettableInterface.php';
        include_once \dirname(__DIR__, 6).'/vendor/psr/log/src/LoggerAwareTrait.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/cache/Traits/AbstractAdapterTrait.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/cache-contracts/CacheTrait.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/cache/Traits/ContractsTrait.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/cache/Adapter/AbstractAdapter.php';

        return $container->services['cache.system'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('Y8T8Ujzux1', 0, $container->getParameter('container.build_id'), ($container->targetDir.''.'/pools/system'), ($container->privates['logger'] ?? self::getLoggerService($container)));
    }
}