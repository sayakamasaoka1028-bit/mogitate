<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;

class ProductController extends Controller
{
    // 一覧
public function index(Request $request)
{
$query = Product::with('seasons');

    // 🔍 キーワード検索
    if ($request->keyword) {
        $query->where('name', 'like', '%' . $request->keyword . '%');
    }

    // 💰 価格並び替え
    if ($request->sort === 'low') {
        $query->orderBy('price', 'asc');
    } elseif ($request->sort === 'high') {
        $query->orderBy('price', 'desc');
    }

    // 🌸 季節フィルタ
    if ($request->season) {
        $query->whereHas('seasons', function ($q) use ($request) {
            $q->where('season_id', $request->season);
        });
}


    $products = $query->paginate(6)->withQueryString();
    $seasons = Season::all();

    return view('products.index', compact('products', 'seasons'));
}

    // 登録画面
    public function create()
    {
        $seasons = Season::all();
        return view('products.register', compact('seasons'));
    }

    // 登録処理
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:50',
        'price' => 'required|integer|min:0|max:10000',
        'description' => 'required|max:120',
        'image' => 'required|image|mimes:jpg,jpeg,png',
'seasons' => 'required|array',
'seasons.*' => 'exists:seasons,id',

    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }

    // 🔥 ここ重要
    $product = Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'image' => $imagePath,
    ]);

    // 季節保存
$product->seasons()->sync($request->seasons);

    return redirect('/products');
}


    // 詳細
    public function show($productId)
    {
        $product = Product::with('seasons')->findOrFail($productId);
        return view('products.show', compact('product'));
    }

    // 更新画面
    public function edit($productId)
    {
        $product = Product::with('seasons')->findOrFail($productId);
        $seasons = Season::all();
        return view('products.edit', compact('product', 'seasons'));
    }

    // 更新処理
public function update(Request $request, $productId)
{
    $rules = [
        'name' => 'required|max:50',
        'price' => 'required|integer|min:0|max:10000',
        'description' => 'required|max:120',
        'seasons' => 'required|array',
        'seasons.*' => 'exists:seasons,id',
    ];

    // 🔥 画像がある時だけバリデーション追加
    if ($request->hasFile('image')) {
        $rules['image'] = 'image|mimes:jpg,jpeg,png|max:2048';
    }

    $request->validate($rules);

    $product = Product::findOrFail($productId);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $product->image = $imagePath;
    }

    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
    ]);

    $product->seasons()->sync($request->seasons);

    return redirect('/products');
}

// 削除
public function destroy($productId)
{
    $product = Product::findOrFail($productId);
    $product->seasons()->detach();
    $product->delete();

    return \redirect('/products');
}

// 検索
public function search(Request $request)
{
    $keyword = $request->keyword;

    $products = Product::where('name', 'like', "%{$keyword}%")->get();

    return view('products.index', compact('products'));
}

}

