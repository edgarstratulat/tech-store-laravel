<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = [
            [
            'name' => 'Iphone 16',
            'price' => '989',
            'sale_price' => '5',
            'desc' => 'Arroz',
            'category' => 'Telemóveis',
            'subCategory' => 'iphone',
            'stock' => '100',
        ],
    ];
        
        DB::table('Telemoveis')->insert($product);
    }
}
