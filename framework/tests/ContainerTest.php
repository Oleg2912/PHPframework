<?php

namespace Framework\Tests;

use Framework\Container\Container;
use Framework\Exceptions\Container\ContainerException;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    public function test_getting_service_from_container()
    {
        $container = new Container();

        $container->add('Example', Example::class);

        $this->assertInstanceOf(Example::class,  $container->get('Example'));
    }

    public function test_container_has_exception_ContainerException_if_add_wrong_service()
    {
        $container = new Container();

        $this->expectException(ContainerException::class);

        $container->add('no-class');
    }

    public function test_has_method()
    {
        $container = new Container();

        $container->add('Example', Example::class);

        $this->assertTrue($container->has('Example'));
        $this->assertFalse($container->has('no-class'));
    }

    public function test_recursively_autowired()
    {
        $container = new Container();

        $container->add('ExampleResolve', ExampleResolve::class);


        /** @var ExampleResolve $exampleResolve */
        $exampleResolve = $container->get('ExampleResolve');

        //$this->assertInstanceOf(Example::class,  $exampleResolve->getExample());
    }

}