<?php

namespace Framework\Http;

class Response
{

    public function __construct(
        public mixed $content,
        public int $statusCode,
        public array $headers,
    ) {}


    public function send(): void
    {
        echo $this->content;
    }
}