# Laravel + Tailwind CSS Todo App

Laravel と Tailwind CSS を使って作成した、シンプルな Todo 管理アプリです。  
プログラミング学習のアウトプットとして、CRUD 機能の実装からデプロイまでを一通り行いました。

---

## 🔗 公開URL（実際に動くアプリ）

https://laravel-tailwind-todo.onrender.com/todos

---

##  アプリ概要

- Todo の追加・一覧表示・完了切り替え・削除ができます
- Laravel の MVC 構造を意識して実装しました
- Tailwind CSS を使ってシンプルな UI を作成しています

---

##  機能一覧（CRUD）

| 操作 | 内容 |
|----|----|
| Create | Todo を追加 |
| Read | Todo 一覧を表示 |
| Update | 完了 / 未完了の切り替え |
| Delete | Todo を削除 |

---

##  使用技術

- Laravel 12
- PHP 8.4
- SQLite
- Tailwind CSS
- Vite
- Docker（Render デプロイ用）
- Git / GitHub
- Render（本番環境デプロイ）

---

##  構成（MVC）

- Model：`app/Models/Todo.php`
- Controller：`app/Http/Controllers/TodoController.php`
- View：`resources/views/todos/index.blade.php`
- Route：`routes/web.php`

---

##  デプロイについて

- Render を使って本番環境にデプロイしています
- Docker を利用して Laravel アプリを起動しています
- 本番環境では `APP_DEBUG=false` に設定しています

---

##  スクリーンショット

※ 後ほど追加予定

---

## 📂 リポジトリ

https://github.com/mamimitome/laravel-tailwind-todo

---

## 📝 学習ポイント

- Laravel の基本的な CRUD 実装
- ルーティングとコントローラの役割理解
- Tailwind CSS を使った UI 構築
- GitHub への Push / 管理
- Render を使ったデプロイ経験

---

##  作成者

mami mitome  
プログラミング学習中（Laravel / PHP）
