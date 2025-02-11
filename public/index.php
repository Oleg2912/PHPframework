<?php

use Framework\Http\Kernel;
use Framework\Http\Request;

define('APP_PATH', dirname(__DIR__));

require_once APP_PATH.'/vendor/autoload.php';



$request = Request::createFromGlobals();
$kernel = new Kernel();
$response = $kernel->handle($request);
$response->send();