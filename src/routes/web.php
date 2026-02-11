<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return 'OK';
});

Route::get('/products', [ProductController::class, 'index']);

