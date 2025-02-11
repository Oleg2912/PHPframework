<?php

namespace Framework\Http;

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Kernel
{
    public function handle(Request $request): Response
    {
        $dispatcher = simpleDispatcher(function (RouteCollector $collector) {
            $collector->get('/home', function () {
                return new Response("<h1>HELO! dfsdfsdfsdf</h1>");
            });
        });

        $routeInfo = $dispatcher->dispatch(
            $request->server['REQUEST_METHOD'],
            $request->server['REQUEST_URI']
        );

        [$status, $handler, $vars] = $routeInfo;

        //dd($dispatcher);
        return $handler($vars);
    }
}