<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// トップページ → 商品一覧へ
Route::get('/', function () {
    return redirect('/products');
});

/*
|--------------------------------------------------------------------------
| Products（仕様通り）
|--------------------------------------------------------------------------
*/

// 一覧
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

// 登録
Route::get('/products/register', [ProductController::class, 'create']);
Route::post('/products/register', [ProductController::class, 'store']);

// 詳細
Route::get('/products/{productId}', [ProductController::class, 'show']);

Route::get('/products/{productId}/edit', [ProductController::class, 'edit']);

// 更新
Route::post('/products/{productId}/update', [ProductController::class, 'update']);

// 削除
Route::post('/products/{productId}/delete', [ProductController::class, 'destroy']);

// 検索
Route::get('/products/search', [ProductController::class, 'search']);

