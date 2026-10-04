<?php

namespace App\Console\Commands;

use App\Services\CatalogBundleService;
use Illuminate\Console\Command;

class ExportCatalogBundle extends Command
{
    protected $signature = 'catalog:export-bundle';

    protected $description = 'Generate a complete ZIP bundle of all landing page fine jewelry products (CSV, JSON, category summary & documentation)';

    public function handle(CatalogBundleService $service): int
    {
        $this->info('📦 Bundling Tabstick fine jewelry landing page catalog...');

        $result = $service->generateBundle();

        $this->table(
            ['Category', 'Slug', 'Products', 'Min Price', 'Max Price', 'Avg Price', 'Inventory'],
            array_map(function ($c) {
                return [
                    $c['category_name'],
                    $c['category_slug'],
                    $c['total_products'],
                    '₹' . number_format($c['min_price_inr']),
                    '₹' . number_format($c['max_price_inr']),
                    '₹' . number_format($c['average_price_inr']),
                    number_format($c['total_inventory']),
                ];
            }, $result['categories_summary'])
        );

        $this->newLine();
        $this->info("✨ Successfully exported {$result['products_count']} products across {$result['categories_count']} categories.");
        $this->line("📁 ZIP archive: <comment>{$result['zip_path']}</comment> (" . round($result['file_size'] / 1024 / 1024, 2) . " MB)");
        $this->line("🌐 Public copy: <comment>{$result['public_zip_path']}</comment>");
        $this->info("📄 Files bundled:");
        foreach ($result['files_included'] as $file) {
            $this->line("   - {$file}");
        }

        return self::SUCCESS;
    }
}
