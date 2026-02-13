@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="mb-4">商品一覧</h2>

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
                        <option value="">価格順</option>
                        <option value="low" {{ request('sort')=='low' ? 'selected' : '' }}>安い順</option>
                        <option value="high" {{ request('sort')=='high' ? 'selected' : '' }}>高い順</option>
                    </select>
                </div>

                {{-- 季節 --}}
                <h6 class="mt-4">季節で絞り込み</h6>
                @foreach($seasons as $season)
                    <div class="form-check">
                        <input class="form-check-input"
                               type="radio"
                               name="season"
                               value="{{ $season->id }}"
                               {{ request('season')==$season->id ? 'checked' : '' }}>
                        <label class="form-check-label">
                            {{ $season->name }}
                        </label>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary mt-3 w-100">検索</button>
            </form>
        </div>

        {{-- 右カラム --}}
        <div class="col-md-9">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100">

                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}"
                                     class="card-img-top"
                                     style="height:200px; object-fit:cover;">
                            @endif

                            <div class="card-body d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">
                                    <a href="/products/{{ $product->id }}" class="text-decoration-none">
                                        {{ $product->name }}
                                    </a>
                                </h6>
                                <strong>¥{{ number_format($product->price) }}</strong>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>

    </div>
</div>

@endsection

