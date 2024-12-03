<?php

namespace ContainerGpu0w3X;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProduitControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\ProduitController' shared autowired service.
     *
     * @return \App\Controller\ProduitController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/ProduitController.php';

        $container->services['App\\Controller\\ProduitController'] = $instance = new \App\Controller\ProduitController(($container->services['doctrine.orm.default_entity_manager'] ?? self::getDoctrine_Orm_DefaultEntityManagerService($container)), ($container->privates['App\\Repository\\ProduitRepository'] ?? $container->load('getProduitRepositoryService')));

        $instance->setContainer((new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'router' => ['services', 'router', 'getRouterService', false],
            'request_stack' => ['services', 'request_stack', 'getRequestStackService', false],
            'http_kernel' => ['services', 'http_kernel', 'getHttpKernelService', false],
            'serializer' => ['privates', 'serializer', 'getSerializerService', false],
            'twig' => ['privates', 'twig', 'getTwigService', true],
            'form.factory' => ['privates', 'form.factory', 'getForm_FactoryService', true],
            'security.csrf.token_manager' => ['privates', 'security.csrf.same_origin_token_manager', 'getSecurity_Csrf_SameOriginTokenManagerService', false],
            'parameter_bag' => ['privates', 'parameter_bag', 'getParameterBagService', false],
        ], [
            'router' => '?',
            'request_stack' => '?',
            'http_kernel' => '?',
            'serializer' => '?',
            'twig' => '?',
            'form.factory' => '?',
            'security.csrf.token_manager' => '?',
            'parameter_bag' => '?',
        ]))->withContext('App\\Controller\\ProduitController', $container));

        return $instance;
    }
}