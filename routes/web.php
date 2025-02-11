<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Framework\Routing\Route;

return [
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/posts/{id}', [PostController::class, 'show']),
];