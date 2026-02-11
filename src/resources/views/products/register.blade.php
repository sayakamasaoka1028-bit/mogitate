@extends('layouts.app')

@section('title', '商品登録')

@section('content')

<h1 class="mb-4">商品登録</h1>

<form action="/products/register" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- 商品名 --}}
    <div class="mb-3">
        <label class="form-label">商品名</label>
        <input type="text" name="name" class="form-control"
               value="{{ old('name') }}">
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    {{-- 価格 --}}
    <div class="mb-3">
        <label class="form-label">価格</label>
        <input type="number" name="price" class="form-control"
               value="{{ old('price') }}">
        @error('price')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    {{-- 説明 --}}
    <div class="mb-3">
        <label class="form-label">説明</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    {{-- 画像 --}}
    <div class="mb-3">
        <label class="form-label">画像</label>
        <input type="file" name="image" class="form-control">
        @error('image')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">登録</button>
    <a href="/products" class="btn btn-secondary">戻る</a>

</form>

@endsection

