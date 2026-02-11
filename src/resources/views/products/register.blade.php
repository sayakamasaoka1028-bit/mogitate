<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品登録</title>
</head>
<body>
    <h1>商品登録</h1>

    <form action="/products" method="POST">
        @csrf

        <label>商品名：</label>
        <input type="text" name="name">

        <button type="submit">登録</button>
    </form>

    <a href="/products">一覧に戻る</a>
</body>
</html>

