# Laravel + Tailwind Todo App

Laravel と Tailwind CSS を使ったシンプルな ToDo アプリです。  
ToDo の追加・完了切り替え・削除（CRUD）ができます。

## Demo
- ローカルで `/todos` にアクセス

## Features（できること）
- Create：ToDo追加
- Read：ToDo一覧表示
- Update：完了/未完了の切り替え
- Delete：ToDo削除

## Tech Stack（使用技術）
- Laravel 12
- PHP 8.x
- SQLite
- Tailwind CSS（Vite）

## Setup（動かし方）
```bash
git clone https://github.com/mamimitome/laravel-tailwind-todo.git
cd todo-app

composer install
npm install

cp .env.example .env
php artisan key:generate

# SQLite
touch database/database.sqlite
php artisan migrate

# Terminal 1（フロント）
npm run dev

# Terminal 2（サーバー）
php artisan serve

## Screenshots
![Todo App Screenshot](docs/todo.png)

