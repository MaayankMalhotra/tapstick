# Tab Stick — Laravel Store

A mobile-first sticker e-commerce starter built completely with Laravel 12 and Blade. No React, Vite, Node, or frontend build step is required.

## Included

- Responsive Blade storefront and product pages
- Database-backed categories, products, inventory, orders, and order items
- Session cart with add, update, and remove actions
- Guest checkout with server-side validation
- Cash on delivery
- Razorpay order creation and signature verification
- SQLite default configuration and sample product seeder

## Requirements

- PHP 8.2 or newer
- Composer 2
- PHP extensions required by Laravel, including SQLite or MySQL support

## Install locally

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```

Open `http://127.0.0.1:8000`.

## Razorpay

Add test or live credentials to `.env`:

```env
RAZORPAY_KEY_ID=
RAZORPAY_KEY_SECRET=
```

Never commit real secrets. COD remains available when Razorpay is not configured.

## Production

Point the web server document root to `public/`, set `APP_ENV=production`, `APP_DEBUG=false`, configure the production database, and run:

```bash
composer install --no-dev --optimize-autoloader
php artisan migrate --seed --force
php artisan optimize
```

Ensure the web-server user can write to `storage/` and `bootstrap/cache/`.

## Inventory admin panel

This release adds a Laravel Blade admin panel at `/admin`, with a dashboard, searchable products, unique SKUs, categories, prices, descriptions, image uploads, visibility controls, low-stock thresholds, and a stock-change history. Archive a product by setting visibility to Hidden; orders and history are retained. Delete only empty categories.

After installing this update on an existing store (keep your current `.env`, database and uploads):

```bash
php artisan migrate --force
php artisan storage:link
php artisan admin:create
php artisan optimize:clear
```

The administrator command prompts for a name, email and hidden password (12 characters minimum). It never creates a default password or promotes an existing account. Open `/admin/login` to sign in. On a new installation, follow the installation steps above first, then these commands.

Stock is adjusted separately from catalog edits: enter `20` for a delivery or `-3` for damaged units and provide a reason. Changes are recorded with the administrator, quantity change, final stock and UTC timestamp. Checkout deductions and payment-start failure restocks are also recorded. History starts with this update; earlier stock changes are not reconstructed. Existing demo products may have no SKU: add one when editing them.

Images accept JPEG, PNG and WebP up to 4 MB. Uploaded images are stored on Laravel's public disk and appear on the storefront after `storage:link`. Use HTTPS in production and set `SESSION_SECURE_COOKIE=true`.

The sample seeder now creates missing examples without overwriting existing prices or stock. Avoid running it on production unless you want missing sample products added.

## Verification and remaining scope

Run `php artisan test` to exercise admin access, login, product validation, uploads, stock adjustments, category rules and COD inventory changes. The editing environment did not have PHP/Composer and refused package installation, so the PHP suite has not been executed here.

This is an inventory/admin starter, not a fully verified production store. Existing Razorpay checkout still needs capture/webhook reconciliation and abandoned-payment stock release before accepting live payments. Customer accounts, fulfillment management and the requested daily lead email scheduler are not included in this admin update. No emails or WhatsApp messages are scheduled or sent.

Framework references: https://laravel.com/docs/12.x/authentication and https://laravel.com/docs/12.x/filesystem
