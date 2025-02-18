<?php

namespace Framework\Tests;


/**
 *  Класс используется только для тестирования
 */
class ExampleResolve
{
    public function __construct(
        public Example $example
    )
    {
    }

    public function getExample(): Example
    {
        return $this->example;
    }
}