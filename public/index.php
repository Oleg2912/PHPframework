<?php

use Framework\Http\Request;
use Framework\Http\Response;

require_once dirname(__DIR__).'/vendor/autoload.php';


$request = Request::createFromGlobals();
$response = new Response("<h1>HELO!</h1>", 200, []);
$response->send();