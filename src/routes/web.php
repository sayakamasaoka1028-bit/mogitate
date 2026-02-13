<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// トップページ → 商品一覧へリダイレクト
Route::get('/', function () {
    return redirect()->route('products.index');
});

// 商品ルート一式（RESTful）
Route::resource('products', ProductController::class);

