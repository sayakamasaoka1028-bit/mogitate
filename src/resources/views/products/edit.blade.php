@extends('layouts.app')

@section('title', '商品更新')

@section('content')

<h2>商品更新</h2>

{{-- エラー表示 --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">商品名</label>
        <input type="text" name="name" class="form-control"
               value="{{ old('name', $product->name) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">価格</label>
        <input type="number" name="price" class="form-control"
               value="{{ old('price', $product->price) }}">
    </div>
<div class="mb-3">
    <label class="form-label">説明</label>
    <textarea name="description" class="form-control" rows="3">
{{ old('description', $product->description) }}
    </textarea>
</div>

<div class="mb-3">
    <label class="form-label">季節</label>

    @foreach ($seasons as $season)
        <div class="form-check">
            <input
                class="form-check-input"
                type="checkbox"
                name="seasons[]"
                value="{{ $season->id }}"
                {{ $product->seasons->contains($season->id) ? 'checked' : '' }}
            >
            <label class="form-check-label">
                {{ $season->name }}
            </label>
        </div>
    @endforeach
</div>

    <div class="mb-3">
        <label class="form-label">画像（任意）</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">更新</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">一覧に戻る</a>
</form>

@endsection

