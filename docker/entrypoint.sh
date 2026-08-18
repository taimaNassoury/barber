#!/bin/bash
set -e

cd /var/www/html

# Generate app key if not already set (safe to run every time; Laravel skips if APP_KEY already in env)
if [ -z "$APP_KEY" ]; then
    echo "WARNING: APP_KEY is not set. Set it in Render environment variables."
fi

# Cache config, routes, views for performance
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Run database migrations automatically on deploy
php artisan migrate --force || true

# Start supervisor (runs nginx + php-fpm)
exec supervisord -c /etc/supervisor/conf.d/supervisord.conf
