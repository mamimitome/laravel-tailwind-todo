# Render公式の「PHP + Nginx」構成に合わせた形（Laravel向け）:contentReference[oaicite:2]{index=2}
FROM ghcr.io/renderinc/nginx-php-fpm:8.3

WORKDIR /var/www/html

# Nginx設定
COPY nginx.conf /etc/nginx/conf.d/default.conf

# アプリコード
COPY . .

# composer
RUN composer install --no-dev --optimize-autoloader

# Node / Vite build（本番用に固める）:contentReference[oaicite:3]{index=3}
RUN npm ci
RUN npm run build

# 起動スクリプト
RUN chmod +x start.sh

EXPOSE 80
CMD ["/var/www/html/start.sh"]

