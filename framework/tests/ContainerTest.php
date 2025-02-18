<?php

namespace Framework\Tests;

use App\Http\Controllers\HomeController;
use Framework\Container\Container;
use Framework\Exceptions\Container\ContainerException;
use Framework\Routing\Route;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    public function test_getting_service_from_container()
    {
        $container = new Container();

        $container->add('route', Route::class);

        $this->assertInstanceOf(Route::class,  $container->get('route'));
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

        $container->add('route', Route::class);

        $this->assertTrue($container->has('route'));
        $this->assertFalse($container->has('no-class'));
    }

}