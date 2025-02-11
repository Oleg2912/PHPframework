<?php

if (!function_exists('dev_exception_handler')) {
    /**
     * Функция для удобного отображения глобальных исключений во время разработки
     * @param Throwable $exception
     * @return mixed
     */
    function dev_exception_handler(Throwable $exception): mixed
    {
        return dump([
            'message' => $exception->getMessage(),
            'statusCode' => $exception->getCode(),
            'file' => $exception->getFile(),
            'line:' => $exception->getLine()
        ]);
    }
}