@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">商品一覧</h2>

        <a href="/products/register" class="btn btn-warning">
            ＋ 商品を追加
        </a>
    </div>

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

        <button type="submit"
                class="btn w-100 mt-2"
                style="
                    background-color:#f4c430;
                    border:none;
                    color:#333;
                    font-weight:600;
                    border-radius:8px;">
            検索
        </button>

        {{-- 並び替え --}}
        <div class="mt-4">
            <select name="sort" class="form-select">
                <option value="">価格順で表示</option>
                <option value="low" {{ request('sort')=='low' ? 'selected' : '' }}>安い順</option>
                <option value="high" {{ request('sort')=='high' ? 'selected' : '' }}>高い順</option>
            </select>
        </div>

    </form>
</div>

        {{-- 右カラム --}}
        <div class="col-md-9">
            <div class="row">
@foreach($products as $product)
<div class="col-md-4 mb-4">
    <a href="/products/{{ $product->id }}" class="text-decoration-none text-dark">

        <div class="card border-0 shadow rounded-3 h-100">

            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}"
                     class="card-img-top rounded-top"
                     style="height:220px; object-fit:cover;">
            @endif

            <div class="card-body d-flex justify-content-between align-items-center px-3 py-2">
                <span class="fw-bold">
                    {{ $product->name }}
                </span>

                <span class="text-muted">
                    ¥{{ number_format($product->price) }}
                </span>
            </div>

        </div>

    </a>
</div>

@endforeach
<div class="d-flex justify-content-center">
    {{ $products->links() }}
</div>

