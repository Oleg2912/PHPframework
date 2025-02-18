<?php

namespace Framework\Container;
use Framework\Exceptions\Container\ContainerException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use ReflectionException;
use ReflectionParameter;

class Container implements ContainerInterface
{
    private array $services = [];

    /**
     * @param string $id
     * @param string|object|null $concrete
     * @return void
     * @throws ContainerException
     */
    public function add(string $id, string|object $concrete = null): void
    {
        if (is_null($concrete)) {
            if (!class_exists($id)) {
                throw new ContainerException("Class $id not found.");
            }
            $concrete = $id;
        }
        $this->services[$id] = $concrete;
    }

    /**
     * @param string $id
     * @return object|null
     * @throws ContainerException|ReflectionException
     */
    public function get(string $id): ?object
    {
        if (!$this->has($id)) {
            if (!class_exists($id)) {
                throw new ContainerException("Class $id could not be resolved.");
            }
            $this->add($id);
        }

        return $this->resolve($this->services[$id]);
    }

    /**
     * @param string $id
     * @return bool
     */
    public function has(string $id): bool
    {
        return !empty($this->services[$id]);
    }

    /**
     * @param $class
     * @return object|null
     * @throws ReflectionException
     * @throws ContainerException
     * @throws ContainerExceptionInterface
     */
    private function resolve($class): ?object
    {
        // Создаем объект ReflectionClass для указанного класса
        $reflectionClass = new \ReflectionClass($class);

        // Получаем конструктор класса
        $constructor = $reflectionClass->getConstructor();

        // Если у класса нет конструктора
        if (is_null($constructor)) {
            // Создаем и возвращаем новый экземпляр класса без параметров
            return $reflectionClass->newInstance();
        }

        // Получаем параметры конструктора
        $constructorParams = $constructor->getParameters();

        // Разрешаем зависимости для параметров конструктора
        $classDependencies = $this->resolveClassDependencies($constructorParams);

        // Создаем и возвращаем новый экземпляр класса, передавая ему разрешенные зависимости
        return $reflectionClass->newInstanceArgs($classDependencies);
    }

    /**
     * @param array $constructorParams
     * @return array
     * @throws ContainerException
     * @throws ContainerExceptionInterface
     * @throws ReflectionException
     * @throws NotFoundExceptionInterface
     */
    private function resolveClassDependencies(array $constructorParams): array
    {
        // Создаем массив для хранения зависимостей
        $classDependencies = [];

        /** @var ReflectionParameter $constructorParam */
        foreach ($constructorParams as $constructorParam) {

            // Получаем тип зависимости из параметра конструктора
            $serviceType = $constructorParam->getType();

            // Получаем экземпляр зависимости из контейнера
            $service = $this->get($serviceType->getName());

            // Добавляем полученную зависимость в массив
            $classDependencies[] = $service;
        }

        // Возвращаем массив разрешенных зависимостей
        return $classDependencies;
    }
}