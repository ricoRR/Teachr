<?php

namespace ContainerFTX4rJn;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProduitControllercreateService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.GL345QQ.App\Controller\ProduitController::create()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.GL345QQ.App\\Controller\\ProduitController::create()'] = ($container->privates['.service_locator.GL345QQ'] ?? $container->load('get_ServiceLocator_GL345QQService'))->withContext('App\\Controller\\ProduitController::create()', $container);
    }
}
