#!/usr/bin/env bash
set -e

# Project root directory
PROJECT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
cd "$PROJECT_DIR"

echo "---------------------------------------------------------"
echo "🚀 Auto-deploy started at $(date '+%Y-%m-%d %H:%M:%S')"
echo "---------------------------------------------------------"

# 1. Fetch latest changes and reset to origin/main
echo "📦 Fetching latest changes from GitHub..."
git fetch origin main
git reset --hard origin/main

# 2. Run migrations if any
echo "🗄️ Running database migrations..."
php artisan migrate --force

# 3. Clear and optimize caches
echo "⚡ Optimizing Laravel caches..."
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 4. Fix permissions
echo "🔒 Ensuring correct file permissions..."
chmod -R 775 storage bootstrap/cache 2>/dev/null || true

echo "---------------------------------------------------------"
echo "✅ Auto-deploy finished successfully at $(date '+%Y-%m-%d %H:%M:%S')"
echo "---------------------------------------------------------"
