<?php

namespace ContainerFTX4rJn;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_IY9GDs9Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.IY9GDs9' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.IY9GDs9'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.zHyJIs5.kernel::registerContainerConfiguration()', 'get_ServiceLocator_ZHyJIs5_KernelregisterContainerConfigurationService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.zHyJIs5.kernel::registerContainerConfiguration()', 'get_ServiceLocator_ZHyJIs5_KernelregisterContainerConfigurationService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.zHyJIs5.kernel::loadRoutes()', 'get_ServiceLocator_ZHyJIs5_KernelloadRoutesService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.zHyJIs5.kernel::loadRoutes()', 'get_ServiceLocator_ZHyJIs5_KernelloadRoutesService', true],
            'App\\Controller\\CategorieController::create' => ['privates', '.service_locator.GL345QQ.App\\Controller\\CategorieController::create()', 'getCategorieControllercreateService', true],
            'App\\Controller\\ProduitController::show_all' => ['privates', '.service_locator.GL345QQ.App\\Controller\\ProduitController::show_all()', 'getProduitControllershowAllService', true],
            'App\\Controller\\ProduitController::create' => ['privates', '.service_locator.GL345QQ.App\\Controller\\ProduitController::create()', 'getProduitControllercreateService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.zHyJIs5.kernel::registerContainerConfiguration()', 'get_ServiceLocator_ZHyJIs5_KernelregisterContainerConfigurationService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.zHyJIs5.kernel::loadRoutes()', 'get_ServiceLocator_ZHyJIs5_KernelloadRoutesService', true],
            'App\\Controller\\CategorieController:create' => ['privates', '.service_locator.GL345QQ.App\\Controller\\CategorieController::create()', 'getCategorieControllercreateService', true],
            'App\\Controller\\ProduitController:show_all' => ['privates', '.service_locator.GL345QQ.App\\Controller\\ProduitController::show_all()', 'getProduitControllershowAllService', true],
            'App\\Controller\\ProduitController:create' => ['privates', '.service_locator.GL345QQ.App\\Controller\\ProduitController::create()', 'getProduitControllercreateService', true],
        ], [
            'kernel::registerContainerConfiguration' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Controller\\CategorieController::create' => '?',
            'App\\Controller\\ProduitController::show_all' => '?',
            'App\\Controller\\ProduitController::create' => '?',
            'kernel:registerContainerConfiguration' => '?',
            'kernel:loadRoutes' => '?',
            'App\\Controller\\CategorieController:create' => '?',
            'App\\Controller\\ProduitController:show_all' => '?',
            'App\\Controller\\ProduitController:create' => '?',
        ]);
    }
}