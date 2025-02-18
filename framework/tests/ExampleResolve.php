<?php

namespace Framework\Tests;

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