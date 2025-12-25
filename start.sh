#!/usr/bin/env bash
set -e

php artisan key:generate --force || true
php artisan migrate --force || true

php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Nginx + php-fpm 起動（ベースイメージ側にあるエントリポイントを使う）
/start.sh
