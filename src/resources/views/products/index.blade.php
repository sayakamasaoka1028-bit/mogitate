@extends('layouts.app')

@section('title', '商品一覧')

@section('content')

<h1 class="mb-4">商品一覧</h1>

<form action="/products/search" method="get" class="d-flex mb-3">
    <input type="text" name="keyword" class="form-control me-2" placeholder="検索キーワード">
    <button type="submit" class="btn btn-primary">検索</button>
</form>

<a href="/products/register" class="btn btn-success mb-3">商品登録</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>商品名</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
		<td>
    		@if($product->image)
       		 <img src="{{ asset('storage/' . $product->image) }}" width="80">
    		@endif

   		 <a href="/products/{{ $product->id }}">
       		 {{ $product->name }}
   		 </a>
	　　　</td>

            <td>
                <a href="/products/{{ $product->id }}/update" class="btn btn-warning btn-sm">編集</a>

                <form action="/products/{{ $product->id }}/delete" method="post" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

