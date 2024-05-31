<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/product/filter' => [[['_route' => 'product_filter', '_controller' => 'EasyBell\\Apps\\Product\\Controller\\ProductFilterController::filter'], null, ['GET' => 0], null, false, false, null]],
        '/product/post' => [[['_route' => 'product_post', '_controller' => 'EasyBell\\Apps\\Product\\Controller\\ProductPostController::post'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/product/get/([^/]++)(*:28)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        28 => [
            [['_route' => 'product_get', '_controller' => 'EasyBell\\Apps\\Product\\Controller\\ProductGetController::get'], ['name'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
