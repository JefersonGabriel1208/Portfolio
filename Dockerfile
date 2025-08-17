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
RUN docker-php-ext-install pdo pdo_mysql mbstring bcmath
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-progress
COPY . .

# -------- Stage 3: imagem final de runtime -----------------
FROM php:8.2-cli
WORKDIR /app
ENV PORT=10000
RUN docker-php-ext-install pdo pdo_mysql mbstring bcmath
COPY --from=build-php /app /app
COPY --from=build-frontend /app/public/build /app/public/build
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
EXPOSE 10000
CMD ["/entrypoint.sh"]
