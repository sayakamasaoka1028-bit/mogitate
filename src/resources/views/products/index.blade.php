<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品一覧</title>
</head>
<body>
<h1>商品一覧</h1>

<form action="/products/search" method="get">
    <input type="text" name="keyword">
    <button type="submit">検索</button>
</form>

<a href="/products/register">商品登録</a>

<ul>
@foreach ($products as $product)
    <li>
        <a href="/products/{{ $product->id }}">
            {{ $product->name }}
        </a>

        <a href="/products/{{ $product->id }}/update">編集</a>

        <form action="/products/{{ $product->id }}/delete" method="post" style="display:inline;">
            @csrf
            <button type="submit">削除</button>
        </form>
    </li>
@endforeach
</ul>

</body>
</html>

