<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Framework\Http\Response;
use Framework\Routing\Route;

return [
    Route::get('/home', [HomeController::class, 'index']),
    Route::post('/posts/{id}', [PostController::class, 'show']),
    Route::get('/callable', function () {
        return new WResponse('callable');
    })
];