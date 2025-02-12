<?php

namespace Framework\Http;

use Framework\Enums\HttpStatusEnum;
use Framework\Exceptions\Http\HttpException;
use Framework\Routing\RouterInterface;

readonly class Kernel
{
    /**
     * @param RouterInterface $router
     */
    public function __construct(
        private RouterInterface $router
    ) {}


    /**
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request): Response
    {
        try {
            [$routeHandler, $vars] = $this->router->dispatch($request);
            $response = call_user_func_array($routeHandler, $vars);
        } catch (HttpException $exception) {
            $response = new Response(content: $exception->getMessage(), statusCode: $exception->getStatusCode());
        } catch (\Throwable $exception) {
            dev_exception_handler($exception);
            //$response = new Response(content: $exception->getMessage(), statusCode: HttpStatusEnum::INTERNAL_SERVER_ERROR->value);
        }


        return $response;
    }
}