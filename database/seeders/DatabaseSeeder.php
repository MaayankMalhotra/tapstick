<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $category = Category::firstOrCreate(['slug' => 'popular'], ['name' => 'Popular']);
        foreach ([['Good Vibes','good-vibes','☀️',99],['Create More','create-more','✦',89],['Road Trip','road-trip','🚗',119],['No Bad Days','no-bad-days','🌈',99]] as [$name,$slug,$emoji,$price]) {
            Product::firstOrCreate(['slug'=>$slug], ['sku'=>'DEMO-'.strtoupper($slug),'category_id'=>$category->id,'name'=>$name,'emoji'=>$emoji,'price'=>$price,'stock'=>100,'is_active'=>true,'description'=>'Sample product. Replace with your actual product description before launch.']);
        }
    }
}
