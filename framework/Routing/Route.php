<?php

namespace Framework\Routing;

class Route
{

    /**
     * @param string $uri
     * @param callable|array $handler
     * @return array
     */
    public static function get(string $uri, callable|array $handler): array
    {
        return ['GET', $uri, $handler];

    }

    /**
     * @param string $uri
     * @param callable|array $handler
     * @return array
     */
    public static function post(string $uri, callable|array $handler): array
    {
        return ['POST', $uri, $handler];

    }

}