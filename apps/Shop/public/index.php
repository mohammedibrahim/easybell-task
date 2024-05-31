<?php

declare(strict_types=1);

use EasyBell\Apps\Shop\ShopKernel;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;

$rootPath = dirname(__DIR__);


require_once $rootPath.'/../../vendor/autoload_runtime.php';

(new Dotenv())->loadEnv($rootPath.'/../../.env');

$kernel = new ShopKernel('dev', true);

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
