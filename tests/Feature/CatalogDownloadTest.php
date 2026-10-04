<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Services\CatalogBundleService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use ZipArchive;

class CatalogDownloadTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $category = Category::firstOrCreate(
            ['slug' => 'rings'],
            ['name' => 'Rings']
        );

        Product::firstOrCreate(
            ['slug' => 'tabstick-classic-solitaire-ring'],
            [
                'category_id' => $category->id,
                'name' => 'Tabstick Classic Solitaire Ring',
                'sku' => 'TAB-RING-001',
                'description' => '18K Gold Plated Solitaire Ring',
                'price' => 499.00,
                'stock' => 25,
                'is_active' => true,
            ]
        );
    }

    public function test_catalog_export_artisan_command_generates_bundle(): void
    {
        $this->artisan('catalog:export-bundle')
            ->assertExitCode(0);

        $zipPath = storage_path('app/exports/' . CatalogBundleService::EXPORT_ZIP_NAME);
        $this->assertFileExists($zipPath);

        $zip = new ZipArchive();
        $this->assertTrue($zip->open($zipPath) === true);

        $expectedFiles = [
            'tabstick-fine-jewelry-catalog.csv',
            'tabstick-fine-jewelry-catalog.json',
            'tabstick-categories-summary.csv',
            'README.txt',
        ];

        foreach ($expectedFiles as $file) {
            $this->assertNotFalse($zip->locateName($file), "Missing {$file} in zip archive");
        }

        $zip->close();
    }

    public function test_catalog_download_endpoint_returns_zip(): void
    {
        $response = $this->get(route('catalog.download'));

        $response->assertOk();
        $response->assertHeader('content-type', 'application/zip');
        $this->assertStringContainsString('tabstick-fine-jewelry-catalog.zip', (string)$response->headers->get('content-disposition'));
    }

    public function test_landing_page_renders_catalog_download_link(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee(route('catalog.download'), false);
        $response->assertSee('Download Catalog (ZIP)');
    }
}
