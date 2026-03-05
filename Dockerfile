FROM php:8.2-cli

# Instala extensões necessárias
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo pdo_sqlite \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia os arquivos de dependência primeiro (cache de camadas)
COPY composer.json composer.lock ./

# Instala dependências
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# Copia o restante do projeto
COPY . .

# Gera o autoload otimizado e roda scripts do Laravel
RUN composer dump-autoload --optimize \
    && php artisan package:discover --ansi

# Garante que o diretório do SQLite e storage existam com permissões corretas
RUN mkdir -p database storage/framework/{sessions,views,cache} storage/logs \
    && touch database/database.sqlite \
    && chmod -R 775 storage bootstrap/cache database \
    && chown -R www-data:www-data storage bootstrap/cache database

EXPOSE 8000

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
