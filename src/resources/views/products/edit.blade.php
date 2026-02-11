<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品更新</title>
</head>
<body>

<h1>商品更新</h1>

<form action="/products/{{ $product->id }}/update" method="post">
    @csrf
    商品名：
    <input type="text" name="name" value="{{ $product->name }}">
    <button type="submit">更新</button>
</form>

<a href="/products">一覧に戻る</a>

</body>
</html>

