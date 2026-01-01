# Laravel + Tailwind CSS Todo App

Laravel と Tailwind CSS を使って作成した、学習用の Todo 管理アプリです。

Laravel の基本的な使い方（CRUD、認証、画面表示の流れ）を理解することを目的に作成しました。

---

## このアプリについて

- Todo を追加・表示・完了切り替え・削除できるシンプルなアプリです
- ログインしたユーザーごとに Todo を管理できるようにしています
- Laravel 学習のアウトプットとして、実際に動くアプリを作ることを目標にしました

---

## 公開URL（Render）

https://laravel-tailwind-todo.onrender.com/todos

※ 無料プランのため、初回アクセス時に少し時間がかかる場合があります。

---

## 機能一覧

|機能 ：内容

Todo追加 : やることを登録
Todo一覧 : 登録した Todo を表示
完了切替  : チェックで完了／未完了を切り替え
削除  : Todo を削除
認証  : ログインユーザーごとに Todo を管理

---

## 使用技術

- Laravel 12
- PHP 8.4
- SQLite
- Tailwind CSS
- Vite
- Git / GitHub
- Render（デプロイ）

---

## アプリ構成（簡単な説明）

- Model：Todo データを扱うクラス  
  `app/Models/Todo.php`

- Controller：画面表示や処理をまとめたクラス  
  `app/Http/Controllers/TodoController.php`

- View：画面（HTML）部分  
  `resources/views/todos/index.blade.php`

- Route：URL と処理の対応付け  
  `routes/web.php`

---

## デプロイについて

- Render を使ってアプリを公開しています
- Docker を使用して Laravel アプリを起動しています
- 本番環境では `APP_DEBUG=false` に設定しています

---

## スクリーンショット

![Todo App Screenshot](docs/todo.png)

---

## 学習して理解できたこと

- Laravel の基本的な CRUD の流れ
- ルーティング・コントローラ・ビューの役割
- ログインユーザーとデータを紐付ける考え方
- Tailwind CSS を使った簡単な UI 調整
- GitHub を使ったコード管理
- アプリを実際に公開するまでの流れ

---

## 👩‍💻 作成者

mami mitome
Laravel / PHP を中心にプログラミングを学習中です。
