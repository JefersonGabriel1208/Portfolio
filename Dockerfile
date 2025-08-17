# -------- Stage 1: build dos assets (Vite/Tailwind) --------
FROM node:18-alpine AS build-frontend
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# -------- Stage 2: instalar dependências PHP (Composer) ----
FROM php:8.2-cli AS build-php
WORKDIR /app

# Pacotes do sistema para compilar extensões e rodar composer
RUN apt-get update && apt-get install -y \
    git curl unzip pkg-config \
    libonig-dev libzip-dev libpq-dev \
 && rm -rf /var/lib/apt/lists/*

# composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1

# Instala vendors sem rodar scripts (pois ainda não copiamos o app inteiro)
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-progress --no-scripts

# Agora copiamos o código da aplicação
COPY . .

# -------- Stage 3: imagem final de runtime -----------------
FROM php:8.2-cli
WORKDIR /app
ENV PORT=10000

# Pacotes do sistema necessários em runtime
RUN apt-get update && apt-get install -y \
    git curl unzip pkg-config \
    libonig-dev libzip-dev libpq-dev \
 && rm -rf /var/lib/apt/lists/*

# Extensões PHP necessárias para Laravel (inclui MySQL e PostgreSQL)
RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring bcmath zip

# Copia app + vendor + build do front
COPY --from=build-php /app /app
COPY --from=build-frontend /app/public/build /app/public/build

# Entrypoint
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 10000
CMD ["/entrypoint.sh"]
