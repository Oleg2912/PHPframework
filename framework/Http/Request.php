<?php

namespace Framework\Http;

class Request
{

    public function __construct(
        private readonly array $getParams,
        private readonly array $postData,
        private readonly array $cookies,
        private readonly array $files,
        private readonly array $server
    ) {}

    public static function createFromGlobals(): static
    {
        return new static(
            getParams: $_GET,
            postData: $_POST,
            cookies: $_COOKIE,
            files: $_FILES,
            server: $_SERVER
        );
    }
}