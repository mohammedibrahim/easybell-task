<?php

namespace Container4JULiPr;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getPostProductCommandHandlerService extends EasyBell_Apps_Product_ProductKernelDevDebugContainer
{
    /**
     * Gets the private 'EasyBell\Product\Application\Create\PostProductCommandHandler' shared autowired service.
     *
     * @return \EasyBell\Product\Application\Create\PostProductCommandHandler
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 6).'/src/Shared/Domain/Bus/Command/CommandHandler.php';
        include_once \dirname(__DIR__, 6).'/src/Product/Application/Create/PostProductCommandHandler.php';

        return $container->privates['EasyBell\\Product\\Application\\Create\\PostProductCommandHandler'] = new \EasyBell\Product\Application\Create\PostProductCommandHandler(($container->privates['EasyBell\\Product\\Application\\Create\\ProductCreator'] ?? $container->load('getProductCreatorService')));
    }
}
