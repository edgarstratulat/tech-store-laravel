<?php

namespace Database\Seeders;

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
        $subCategory = [
            ['name' => 'Desktop', 'category_id' => 1],  
            ['name' => 'Gaming', 'category_id' => 1],  
            ['name' => 'Portáteis', 'category_id' => 1],  
            ['name' => 'Workstation', 'category_id' => 1],  
            ['name' => 'Micro-computadores', 'category_id' => 1],
            ['name' => 'Rato & Teclados', 'category_id' => 2],  
            ['name' => 'Monitores', 'category_id' => 2],  
            ['name' => 'Audio', 'category_id' => 2],  
            ['name' => 'Vídeo', 'category_id' => 2],
            ['name' => 'Iphone', 'category_id' => 3],  
            ['name' => 'Android', 'category_id' => 3],
            ['name' => 'Processadores', 'category_id' => 4],  
            ['name' => 'Memória RAM', 'category_id' => 4],  
            ['name' => 'Armazenamento', 'category_id' => 4],  
            ['name' => 'Motherboards', 'category_id' => 4],  
            ['name' => 'Placas Gráficas', 'category_id' => 4],  
            ['name' => 'Fontes de Alimentação', 'category_id' => 4],  
            ['name' => 'CPU Coolers', 'category_id' => 4],  
            ['name' => 'Caixas para Computadores', 'category_id' => 4],
            ['name' => 'Para Computador', 'category_id' => 5],  
            ['name' => 'Para Telemóvel', 'category_id' => 5],  
            ['name' => 'Para Casa', 'category_id' => 5],
        ];

        DB::table('subCategories')->insert($subCategory);
    }
}
