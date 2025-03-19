<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category =  [
            ['name' => 'Computadores'],
            ['name' => 'Periféricos'],
            ['name' => 'Telemóveis'],
            ['name' => 'Componentes'],
            ['name' => 'Acessórios'],
        ];

        DB::table('categories')->insert($category);
    }
}
