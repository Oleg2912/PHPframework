<?php

namespace Framework\Http;

use Framework\Routing\RouterInterface;

class Kernel
{
    public function __construct(
        private RouterInterface $router
    ) {}


    public function handle(Request $request): Response
    {
        [$routeHandler, $vars] = $this->router->dispatch($request);
        $response = call_user_func_array($routeHandler, $vars);

        return $response;
    }
}