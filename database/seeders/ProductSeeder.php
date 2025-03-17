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
            'sale_price' => '0',
            'desc' => 'Arroz',
            'category' => 'Telemóveis',
            'subCategory' => 'iphone',
            'stock' => '100',
            'image_path' => 'images/6w6PCzXATZdTg4YpZqcE1IMjQNDrGFRKVMS7tmjA.webp'
        ],
        [
            'name' => 'Iphone 16 Pro',
            'price' => '1399',
            'sale_price' => '0',
            'desc' => 'Arroz',
            'category' => 'Telemóveis',
            'subCategory' => 'iphone',
            'stock' => '100',
            'image_path' => 'images/6w6PCzXATZdTg4YpZqcE1IMjQNDrGFRKVMS7tmjA.webp'
        ],
        [
            'name' => 'Xiaomi 14TPRO',
            'price' => '1399',
            'sale_price' => '0',
            'desc' => 'Arroz',
            'category' => 'Telemóveis',
            'subCategory' => 'iphone',
            'stock' => '100',
            'image_path' => 'images/6w6PCzXATZdTg4YpZqcE1IMjQNDrGFRKVMS7tmjA.webp'
        ],
    ];
        
        DB::table('Telemoveis')->insert($product);
    }
}
