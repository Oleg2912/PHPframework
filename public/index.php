<?php

use Framework\Http\Request;
use Framework\Http\Kernel;
use Framework\Routing\Router;

define('APP_PATH', dirname(__DIR__));

require_once APP_PATH . '/framework/helpers.php';
require_once APP_PATH . '/vendor/autoload.php';
$request = Request::createFromGlobals();
$router = new Router();
$kernel = new Kernel($router);
$response = $kernel->handle($request);
$response->send();
