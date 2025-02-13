<?php

namespace Framework\Routing;

use Framework\Http\Request;
use Framework\Exceptions\Http\MethodNotAllowedException;
use Framework\Exceptions\Http\RouteNotFoundException;

interface RouterInterface
{

    /**
     * @param Request $request
     * @return array
     * @throws MethodNotAllowedException
     * @throws RouteNotFoundException
     */
    public function dispatch(Request $request): array;

}