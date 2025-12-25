FROM php:8.3-cli

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
  git unzip curl libsqlite3-dev \
  && docker-php-ext-install pdo pdo_sqlite \
  && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Node（Vite build用）
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
  && apt-get update && apt-get install -y nodejs \
  && rm -rf /var/lib/apt/lists/*

COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN npm ci
RUN npm run build

# RenderはPORT環境変数でポートを渡すので、それで起動
CMD php artisan migrate --force || true \
 && php artisan serve --host 0.0.0.0 --port ${PORT:-10000}
