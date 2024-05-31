<?php

declare(strict_types=1);
// src/Kernel.php

namespace EasyBell\Apps\Shop;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class ProductKernel extends BaseKernel
{
    use MicroKernelTrait;


    // optional, to use the standard Symfony cache directory
    public function getCacheDir(): string
    {
        return __DIR__.'/../var/cache/'.$this->getEnvironment();
    }

    // optional, to use the standard Symfony logs directory
    public function getLogDir(): string
    {
        return __DIR__.'/../var/log';
    }

    protected function configureContainer(ContainerConfigurator $container): void
    {
        $container->import(__DIR__.'/../config/services.yaml');

        $container->import(__DIR__.'/../config/packages/framework.yaml');
        $container->import(__DIR__.'/../config/packages/cache.yaml');
        $container->import(__DIR__.'/../config/packages/routing.yaml');
        $container->import(__DIR__.'/../config/packages/doctrine.yaml');

        $container->services()
            ->load('EasyBell\\Apps\\Shop\\', __DIR__.'/*')
            ->autowire()
            ->autoconfigure()
        ;
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import(__DIR__.'/Controller/', 'attribute');
    }

    protected function getBundlesPath(): string
    {
        return __DIR__.'/../config/bundles.php';
    }
}
