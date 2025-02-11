<?php

use App\Http\Controllers\HomeController;
use Framework\Routing\Route;

return [
    Route::get('/home', [HomeController::class, 'index'])
];