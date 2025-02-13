<?php

namespace Framework\Http;

readonly class Request
{

    /**
     * @param array $getParams
     * @param array $postData
     * @param array $cookies
     * @param array $files
     * @param array $server
     */
    public function __construct(
        private array $getParams,
        private array $postData,
        private array $cookies,
        private array $files,
        private array $server
    ) {}

    /**
     * @return static
     */
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

    /**
     * @return string
     */
    public function getUri(): string
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->server['REQUEST_METHOD'];
    }
}