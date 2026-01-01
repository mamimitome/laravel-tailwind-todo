# Laravel + Tailwind CSS Todo App

Laravel と Tailwind CSS を使用して作成した、認証付きのシンプルな Todo 管理アプリです。
Laravel 学習のアウトプットとして、CRUD 機能の実装から本番環境へのデプロイまでを一通り経験しました。

---

## 公開URL（実際に動くアプリ）

https://laravel-tailwind-todo.onrender.com/todos

---

## アプリ概要

- Todo の追加・一覧表示・完了切り替え・削除が可能
- Laravel の MVC 構造を意識して設計・実装
- Tailwind CSS を用いて、シンプルで見やすい UI を作成
- ログインユーザーごとに Todo を管理できるよう実装

---

## 機能一覧（CRUD）

| 操作 | 内容 |
|----|----|
| Create | Todo を追加 |
| Read | Todo 一覧を表示 |
| Update | 完了 / 未完了の切り替え |
| Delete | Todo を削除 |

---

## 使用技術

- Laravel 12
- PHP 8.4
- SQLite
- Tailwind CSS
- Vite
- Docker（Render デプロイ用）
- Git / GitHub
- Render（本番環境デプロイ）

---

## アプリ構成（MVC）

- Model：`app/Models/Todo.php`
- Controller：`app/Http/Controllers/TodoController.php`
- View：`resources/views/todos/index.blade.php`
- Route：`routes/web.php`

---

## デプロイについて

- Render を使用して本番環境にデプロイ
- Docker を用いて Laravel アプリを起動
- 本番環境では `APP_DEBUG=false` に設定し、セキュリティを考慮

---

## スクリーンショット

![Todo App Screenshot](docs/todo.png)

---

## リポジトリ

https://github.com/mamimitome/laravel-tailwind-todo

---

## 学習・工夫ポイント

- Laravel における CRUD の基本的な流れを理解
- ルーティング・コントローラ・ビューの役割を意識した実装
- ログインユーザーとデータを紐付ける設計
- Tailwind CSS を使った UI 調整
- GitHub を使ったコード管理
- Render を利用したデプロイ経験

---

## 作成者

mami mitome
Laravel / PHP を中心に学習中
