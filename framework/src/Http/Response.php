<?php

namespace Framework\Http;

class Response
{
    /**
     * @param mixed $content
     * @param int $statusCode
     * @param array $headers
     */
    public function __construct(
        public mixed $content,
        public int $statusCode = 200,
        public array $headers = [],
    )
    {
        http_response_code($this->statusCode);
    }


    /**
     * @return void
     */
    public function send(): void
    {
        echo $this->content;
    }
}