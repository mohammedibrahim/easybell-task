<?php

namespace ContainerXMlyU0p;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrineProductRepositoryService extends EasyBell_Apps_Product_ProductKernelDevDebugContainer
{
    /**
     * Gets the private 'EasyBell\Product\Infrastructure\Repository\DoctrineProductRepository' shared autowired service.
     *
     * @return \EasyBell\Product\Infrastructure\Repository\DoctrineProductRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 6).'/src/Shared/Infrastructure/Persistence/Doctrine/DoctrineRepository.php';
        include_once \dirname(__DIR__, 6).'/src/Product/Domain/Contracts/ProductRepositoryContract.php';
        include_once \dirname(__DIR__, 6).'/src/Product/Infrastructure/Repository/DoctrineProductRepository.php';
        include_once \dirname(__DIR__, 6).'/src/Shared/Domain/Collection/Contracts/CollectionContract.php';
        include_once \dirname(__DIR__, 6).'/src/Shared/Infrastructure/Collection/Collection.php';

        return $container->privates['EasyBell\\Product\\Infrastructure\\Repository\\DoctrineProductRepository'] = new \EasyBell\Product\Infrastructure\Repository\DoctrineProductRepository(($container->services['Doctrine\\ORM\\EntityManager'] ?? $container->load('getEntityManagerService')), new \EasyBell\Shared\Infrastructure\Collection\Collection());
    }
}