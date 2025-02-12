<?php

namespace Framework\Exceptions\Http;

use Framework\Enums\HttpStatusEnum;

class HttpException extends \Exception
{

    /**
     * @var HttpStatusEnum
     */
    protected HttpStatusEnum $statusCode = HttpStatusEnum::OK;

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode->value;
    }

    /**
     * @param HttpStatusEnum $statusCode
     * @return void
     */
    public function setStatusCode(HttpStatusEnum $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

}