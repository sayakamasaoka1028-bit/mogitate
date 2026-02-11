<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
// ① 登録画面表示
    public function register()
    {
        return view('products.register');
    }

    // ② 登録処理
    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
        ]);

        return redirect('/products');
    }
}

