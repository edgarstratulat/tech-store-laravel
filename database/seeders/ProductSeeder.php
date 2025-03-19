<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Test iPhone 16 Pro',
            'price' => 989,
            'sale_price' => 0,
            'description' => 'iPhone 16 Test Description',
            'category_id' => 3,
            'subcategory_id' => 10,
            'stock' => 123,
            'image_path' => null
        ]);
    }
}
