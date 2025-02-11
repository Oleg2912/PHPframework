<?php

namespace Framework\Http;

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Kernel
{
    public function handle(Request $request): Response
    {
        $dispatcher = simpleDispatcher(function (RouteCollector $collector) {
            $routes = include APP_PATH.'/routes/web.php';
            foreach ($routes as $route) {
                $collector->addRoute(...$route);
            }
//            $collector->get('/home', function () {
//                return new Response("<h1>HELO! dfsdfsdfsdf</h1>");
//            });
//            $collector->get('/posts/12', function () {
//                return new Response("<h1>Posts Posts</h1>");
//            });
        });

        $routeInfo = $dispatcher->dispatch(
            $request->getMethod(),
            $request->getUri()
        );

        [$status, $handler, $vars] = $routeInfo;

        //dd($dispatcher);

        return $handler($vars);
    }
}