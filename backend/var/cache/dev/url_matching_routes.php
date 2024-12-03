<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/produits' => [
            [['_route' => 'all_produit', '_controller' => 'App\\Controller\\ProduitController::show_all'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'create_produit', '_controller' => 'App\\Controller\\ProduitController::create'], null, ['POST' => 0], null, false, false, null],
        ],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/produits/([^/]++)(?'
                    .'|(*:63)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        63 => [
            [['_route' => 'get_produit', '_controller' => 'App\\Controller\\ProduitController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'update_produit', '_controller' => 'App\\Controller\\ProduitController::update'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'delete_produit', '_controller' => 'App\\Controller\\ProduitController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
