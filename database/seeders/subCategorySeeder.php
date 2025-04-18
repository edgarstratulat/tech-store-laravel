<?php

namespace Database\Seeders;

use App\Models\subCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class subCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach([
            ['name' => 'desktop', 'category_id' => 1],  
            ['name' => 'laptops', 'category_id' => 1],  
            ['name' => 'workstation', 'category_id' => 1],  
            ['name' => 'mice', 'category_id' => 2],  
            ['name' => 'monitors', 'category_id' => 2],  
            ['name' => 'audio', 'category_id' => 2],  
            ['name' => 'video', 'category_id' => 2],
            ['name' => 'iphone', 'category_id' => 3],  
            ['name' => 'android', 'category_id' => 3],
            ['name' => 'processors', 'category_id' => 4],  
            ['name' => 'ram-memories', 'category_id' => 4],  
            ['name' => 'storage', 'category_id' => 4],  
            ['name' => 'motherboards', 'category_id' => 4],  
            ['name' => 'graphic-cards', 'category_id' => 4],  
            ['name' => 'power-supplies', 'category_id' => 4],  
            ['name' => 'cpu-coolers', 'category_id' => 4],  
            ['name' => 'computer-cases', 'category_id' => 4],
            ['name' => 'keyboard', 'category_id' => 2]
        ] as $subCategory)

        subCategory::create($subCategory);
    }
}
