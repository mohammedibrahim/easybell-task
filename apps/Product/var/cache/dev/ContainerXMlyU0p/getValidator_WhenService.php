<?php

namespace ContainerXMlyU0p;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getValidator_WhenService extends EasyBell_Apps_Product_ProductKernelDevDebugContainer
{
    /**
     * Gets the private 'validator.when' shared service.
     *
     * @return \Symfony\Component\Validator\Constraints\WhenValidator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 6).'/vendor/symfony/validator/ConstraintValidatorInterface.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/validator/ConstraintValidator.php';
        include_once \dirname(__DIR__, 6).'/vendor/symfony/validator/Constraints/WhenValidator.php';

        return $container->privates['validator.when'] = new \Symfony\Component\Validator\Constraints\WhenValidator(NULL);
    }
}