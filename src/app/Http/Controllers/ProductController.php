<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // 一覧
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // 登録画面
    public function register()
    {
        return view('products.register');
    }

    // 登録処理
    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
        ]);

        return redirect('/products');
    }

    // 詳細
    public function show($productId)
    {
        $product = Product::findOrFail($productId);
        return view('products.show', compact('product'));
    }

    // 更新画面
    public function edit($productId)
    {
        $product = Product::findOrFail($productId);
        return view('products.edit', compact('product'));
    }

    // 更新処理
    public function update(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $product->update([
            'name' => $request->name,
        ]);

        return redirect('/products');
    }

    // 削除
    public function delete($productId)
    {
        Product::destroy($productId);
        return redirect('/products');
    }

    // 検索
    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $products = Product::where('name', 'like', "%{$keyword}%")->get();

        return view('products.index', compact('products'));
    }
}

