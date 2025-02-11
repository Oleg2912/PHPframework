<?php

use Framework\Http\Kernel;
use Framework\Http\Request;
use Framework\Routing\Router;

define('APP_PATH', dirname(__DIR__));

require_once APP_PATH.'/framework/helpers.php';
require_once APP_PATH.'/vendor/autoload.php';

try {
    $request = Request::createFromGlobals();
    $router = new Router();
    $kernel = new Kernel($router);
    $response = $kernel->handle($request);
    $response->send();
} catch (\Throwable $exception) {
    dev_exception_handler($exception);
}