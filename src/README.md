# 🍓 Mogitate 商品管理アプリ

## 📌 アプリ概要

本アプリは、商品と季節を紐づけて管理できる商品管理システムです。  
商品（products）と季節（seasons）は多対多の関係を持ち、中間テーブル（product_season）を用いて管理しています。

Laravelを用いたCRUD機能の実装およびリレーション設計の理解を目的として開発しました。

---

# 🛠 技術スタック

- Laravel
- MySQL
- Docker
- Blade

---

# 🎯 技術選定理由

## ■ Laravelを採用した理由

- Eloquent ORMにより多対多リレーションを簡潔に実装可能
- belongsToMany() による中間テーブル管理が容易
- バリデーション・ページネーション機能が標準搭載
- MVC設計により責務分離が明確

## ■ MySQLを採用した理由

- リレーショナルデータベースとして多対多構造の管理に適している
- 外部キー制約によりデータ整合性を担保できる

## ■ Dockerを採用した理由

- 開発環境の統一
- 再現性のある環境構築

---

# 🗂 テーブル設計

## products

- id (PK)
- name
- price
- image
- description
- created_at
- updated_at

## seasons

- id (PK)
- name
- created_at
- updated_at

## product_season（中間テーブル）

- id (PK)
- product_id (FK → products.id)
- season_id (FK → seasons.id)
- created_at
- updated_at

---

# 📊 ER図

```
products 1 ─── n product_season n ─── 1 seasons
```

```
+------------------+
|     products     |
+------------------+
| id (PK)          |
| name             |
| price            |
| image            |
| description      |
| created_at       |
| updated_at       |
+------------------+
          |
          | 1
          |
          | n
+----------------------+
|   product_season     |
+----------------------+
| id (PK)              |
| product_id (FK)      |
| season_id (FK)       |
| created_at           |
| updated_at           |
+----------------------+
          |
          | n
          |
          | 1
+------------------+
|     seasons      |
+------------------+
| id (PK)          |
| name             |
| created_at       |
| updated_at       |
+------------------+
```

---

# 🔗 モデルリレーション

## Product.php

```php
public function seasons()
{
    return $this->belongsToMany(Season::class);
}
```

## Season.php

```php
public function products()
{
    return $this->belongsToMany(Product::class);
}
```

---

# 🖥 画面イメージ

※ imagesフォルダを作成して画像を配置してください

```markdown
![商品一覧](./images/index.png)
![商品登録](./images/create.png)
![商品編集](./images/edit.png)
```

---

# 🚀 実装機能

- 商品一覧表示
- 商品登録
- 商品更新
- 商品削除
- 検索機能
- ページネーション
- 季節の複数選択（多対多リレーション）

---

# 💡 学習ポイント

- 多対多リレーション設計
- 中間テーブルの理解
- Eloquentによるリレーション操作
- Docker環境構築

