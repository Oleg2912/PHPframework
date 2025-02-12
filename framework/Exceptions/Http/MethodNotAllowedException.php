<?php

namespace Framework\Exceptions\Http;

use Framework\Enums\HttpStatusEnum;

class MethodNotAllowedException extends HttpException
{
    /**
     * @var HttpStatusEnum
     */
    protected HttpStatusEnum $statusCode = HttpStatusEnum::METHOD_NOT_ALLOWED;

}