#!/usr/bin/env bash
set -o errexit

echo "👉 Copying env"
cp .env.production .env

echo "📁 Creating necessary directories..."
mkdir -p storage/framework storage/logs bootstrap/cache

echo "🔐 Setting permissions..."
chmod -R 775 storage bootstrap/cache

echo "📦 Installing dependencies..."
composer install --optimize-autoloader --no-dev

echo "🔑 Generating app key..."
php artisan key:generate || true

echo "⚙️ Caching config..."
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true
