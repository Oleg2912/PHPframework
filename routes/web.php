<?php

use Framework\Routing\Route;

return [
    Route::get('/home', ['HomeController::class', 'index'])
];