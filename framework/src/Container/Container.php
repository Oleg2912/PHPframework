<?php

namespace Framework\Container;
use Framework\Exceptions\Container\ContainerException;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{

    private array $services = [];

    public function add(string $id, string|object $concrete = null): void
    {
        if (is_null($concrete)) {
            if (!class_exists($id)) {
                throw new ContainerException("Class $id not found.");
            }
        }
        $this->services[$id] = $concrete;
    }

    public function get(string $id): mixed
    {
        if (!$this->has($id)) {
            if (!class_exists($id)) {
                throw new ContainerException("Class $id could not be resolved.");
            }
            $this->add($id);
        }

        $instance = $this->resolve($this->services[$id]);

        return $instance;
    }

    public function has(string $id): bool
    {
        return isset($this->services[$id]);
    }

    private function resolve($class)
    {
        $reflectionClass = new \ReflectionClass($class);

        $constructor = $reflectionClass->getConstructor();

        if (is_null($constructor)) {
            return $reflectionClass->newInstance();
        }

        $constructorParams = $constructor->getParameters();

        $classDependencies = $this->resolveClassDependencies($constructorParams);

        $instance = $reflectionClass->newInstanceArgs($classDependencies);

        return $instance;
    }
}