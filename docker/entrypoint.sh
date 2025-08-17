#!/usr/bin/env bash
set -e

# Ajusta permissões (evita erro ao escrever cache/logs)
chmod -R 775 storage bootstrap/cache || true

# Gera APP_KEY se não existir
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "base64:" ]; then
  php artisan key:generate --force || true
fi

# Cria symlink do storage (ignora se já existir)
php artisan storage:link || true

# Migrações (se o DB não estiver pronto, não derruba o container)
php artisan migrate --force || true

# Inicia o servidor embutido do PHP apontando para /public
php -S 0.0.0.0:${PORT:-10000} -t public
