<?php

namespace Framework\Routing;

use Framework\Exceptions\Http\MethodNotAllowedException;
use Framework\Exceptions\Http\RouteNotFoundException;
use Framework\Http\Request;

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