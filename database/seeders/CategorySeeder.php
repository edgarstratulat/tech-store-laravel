<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        foreach([
            ['name' => 'Computadores'],
            ['name' => 'Periféricos'],
            ['name' => 'Telemóveis'],
            ['name' => 'Componentes'],
            ['name' => 'Acessórios'],
        ] as $category)

        Category::create($category);
    }
}
