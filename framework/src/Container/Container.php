<?php

namespace Framework\Container;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{

    private array $services = [];

    public function add(string $id, string|object $concrete = null): void
    {
        $this->services[$id] = $concrete;
    }

    public function get(string $id): mixed
    {
        return new $this->services[$id];
    }

    public function has(string $id): bool
    {
        return !empty($this->services[$id]);
    }
}