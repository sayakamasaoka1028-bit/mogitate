@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="mb-4">商品一覧</h2>
 <a href="/products/register" class="btn btn-warning">
      ＋ 商品を追加
  </a>

    <div class="row">

        {{-- 左カラム --}}
        <div class="col-md-3">
            <form action="/products" method="get">

                {{-- キーワード --}}
                <div class="mb-3">
                    <input type="text"
                           name="keyword"
                           class="form-control"
                           placeholder="商品名で検索"
                           value="{{ request('keyword') }}">
                </div>

                {{-- 並び替え --}}
                <div class="mb-3">
                    <select name="sort" class="form-select">
                        <option value="">価格順で表示</option>
                        <option value="low" {{ request('sort')=='low' ? 'selected' : '' }}>安い順</option>
                        <option value="high" {{ request('sort')=='high' ? 'selected' : '' }}>高い順</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3 w-100">検索</button>
            </form>
        </div>

        {{-- 右カラム --}}
        <div class="col-md-9">
            <div class="row">
@foreach($products as $product)
    <div class="col-md-4 mb-4">

        <a href="/products/{{ $product->id }}" 
           class="text-decoration-none text-dark">

            <div class="card shadow-sm h-100">

                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         class="card-img-top"
                         style="height:200px; object-fit:cover;">
                @endif

                <div class="card-body d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">
                        {{ $product->name }}
                    </h6>

                    <strong>{{ number_format($product->price) }}</strong>
                </div>

            </div>

        </a>

    </div>
@endforeach
<div class="d-flex justify-content-center">
    {{ $products->links() }}
</div>

