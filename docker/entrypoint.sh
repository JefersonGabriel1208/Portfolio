#!/usr/bin/env sh
set -e

# Aguarda dependências ficarem disponíveis (útil para DB remoto)
# Se quiser, habilite um check simples aqui.

# Garante permissões (não falha se não existirem)
mkdir -p storage/framework/{cache,sessions,views} || true
mkdir -p bootstrap/cache || true
chmod -R 775 storage bootstrap/cache || true

# Otimizações e cache limpos (evita config antiga)
php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true

# APP KEY (se faltar em produção)
php artisan key:generate --force || true

# Link de storage (ignora se já existir)
php artisan storage:link || true

# Migrações (modo produção exige --force)
php artisan migrate --force || true

# (Opcional) seed inicial
# php artisan db:seed --force || true

# Sobe o servidor embutido do PHP apontando para a public/
php -S 0.0.0.0:$PORT -t public

