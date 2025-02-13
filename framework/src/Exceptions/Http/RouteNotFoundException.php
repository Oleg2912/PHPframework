<?php

namespace Framework\Exceptions\Http;

use Framework\Enums\HttpStatusEnum;

class RouteNotFoundException extends HttpException
{
    /**
     * @var HttpStatusEnum
     */
    protected HttpStatusEnum $statusCode = HttpStatusEnum::NOT_FOUND;

}