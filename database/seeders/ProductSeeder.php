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

        $cpuProducts = [
            [
                'name' => 'Intel Core i5-10400F',
                'manufacturer_id' => 7,
                'price' => 129.99,
                'cpu_id' => 1,
                'image_path' => 'images/intel_i5_10400f.jpeg'
            ],
            [
                'name' => 'Intel Core i7-11700K',
                'manufacturer_id' => 7,
                'price' => 339.99,
                'cpu_id' => 2,
                'image_path' => 'images/intel_i7_11700k.jpeg'
            ],
            [
                'name' => 'AMD Ryzen 5 5600X',
                'manufacturer_id' => 26,
                'price' => 189.99,
                'cpu_id' => 3,
                'image_path' => 'images/ryzen_5_5600x.jpeg'
            ],
            [
                'name' => 'AMD Ryzen 7 5800X',
                'manufacturer_id' => 26,
                'price' => 289.99,
                'cpu_id' => 4,
                'image_path' => 'images/ryzen_7_5800x.jpeg'
            ],
            [
                'name' => 'Intel Core i9-12900K',
                'manufacturer_id' => 7,
                'price' => 549.99,
                'cpu_id' => 5,
                'image_path' => 'images/intel_i9_12900k.jpeg'
            ],
            [
                'name' => 'AMD Ryzen 9 5950X',
                'manufacturer_id' => 26,
                'price' => 649.99,
                'cpu_id' => 6,
                'image_path' => 'images/ryzen_9_5950x.jpeg'
            ],
            [
                'name' => 'Intel Core i3-12100F',
                'manufacturer_id' => 7,
                'price' => 99.99,
                'cpu_id' => 7,
                'image_path' => 'images/intel_i3_12100f.jpeg'
            ],
            [
                'name' => 'AMD Ryzen 3 3100',
                'manufacturer_id' => 26,
                'price' => 89.99,
                'cpu_id' => 8,
                'image_path' => 'images/ryzen_3_3100.jpeg'
            ],
            [
                'name' => 'Intel Core i5-13400F',
                'manufacturer_id' => 7,
                'price' => 209.99,
                'cpu_id' => 9,
                'image_path' => 'images/intel_i5_13400f.jpeg'
            ],
            [
                'name' => 'AMD Ryzen 5 7600X',
                'manufacturer_id' => 26,
                'price' => 249.99,
                'cpu_id' => 10,
                'image_path' => 'images/ryzen_5_7600x.jpeg'
            ]
        ];
        
        foreach ($cpuProducts as $cpu) {
            Product::create([
                'name' => $cpu['name'],
                'manufacturer_id' => $cpu['manufacturer_id'],
                'price' => $cpu['price'],
                'sale_price' => 0,
                'description' => $cpu['name'] . ' - Processador potente para gaming e produtividade.',
                'reconditioned' => 0,
                'category_id' => 4, 
                'subcategory_id' => 12,
                'cpu_id' => $cpu['cpu_id'],
                'ram_id' => null,
                'armazenamento_id' => null,
                'stock' => rand(0, 50),
                'image_path' => $cpu['image_path'],
            ]);
        }

        Product::create([
            'name' => 'Memória RAM Corsair Vengeance LPX 16GB',
            'manufacturer_id' => 8,
            'price' => 79.99,
            'sale_price' => 5,
            'description' => '16GB DDR4 RAM for gaming',
            'reconditioned' => 0,
            'category_id' => 4,  
            'subcategory_id' => 13,
            'ram_id' => 5,
            'stock' => 60,
            'image_path' => "images/corsair_vengeance.jpeg"
        ]);

        Product::create([
            'name' => 'Memória RAM UDIMM Corsair Vengeance 32GB',
            'manufacturer_id' => 8,
            'price' => 99.99,
            'sale_price' => 5,
            'description' => '32GB DDR5 5600mhz RAM for gaming',
            'reconditioned' => 0,
            'category_id' => 4,  
            'subcategory_id' => 13,
            'ram_id' => 9,
            'stock' => 60,
            'image_path' => "images/corsaira.jpg"
        ]);

        Product::create([
            'name' => 'Memória RAM Corsair Vengeance LPX 32GB',
            'manufacturer_id' => 8,
            'price' => 99.99,
            'sale_price' => 5,
            'description' => '32GB DDR4 RAM for gaming',
            'reconditioned' => 0,
            'category_id' => 4,  
            'subcategory_id' => 13,
            'ram_id' => 8,
            'stock' => 60,
            'image_path' => "images/corsair_vengeance.jpeg"
        ]);

        Product::create([
            'name' => 'SSD M.2 Samsung 970 EVO 1TB',
            'manufacturer_id' => 2,
            'price' => 129.99,
            'sale_price' => 10,
            'description' => 'High-speed solid-state drive',
            'reconditioned' => 0,
            'category_id' => 4, 
            'subcategory_id' => 14,
            'ram_id' => null,
            'armazenamento_id' => 8, 
            'stock' => 35,
            'image_path' => "images/samsung_970_evo.jpeg"
        ]);

        Product::create([
            'name' => 'SSD 2.5" Samsung 870 EVO 500GB MLC V-NAND SATA',
            'manufacturer_id' => 2,
            'price' => 64.99,
            'sale_price' => 0,
            'description' => 'High-speed solid-state drive',
            'reconditioned' => 0,
            'category_id' => 4, 
            'subcategory_id' => 14,
            'ram_id' => null,
            'armazenamento_id' => 5,
            'stock' => 35,
            'image_path' => "images/sata.jpeg"
        ]);
    
        Product::create([
            'name' => 'SSD M.2 Samsung 970 EVO 2TB',
            'manufacturer_id' => 2,
            'price' => 149.99,
            'sale_price' => 10,
            'description' => 'High-speed solid-state drive',
            'reconditioned' => 0,
            'category_id' => 4, 
            'subcategory_id' => 14,
            'ram_id' => null,
            'armazenamento_id' => 9,
            'stock' => 35,
            'image_path' => "images/samsung_970_evo.jpeg"
        ]);
    
        Product::create([
            'name' => 'SSD 2.5" Samsung 870 EVO 1TB MLC V-NAND SATA',
            'manufacturer_id' => 2,
            'price' => 84.99,
            'sale_price' => 0,
            'description' => 'High-speed solid-state drive SATA',
            'reconditioned' => 0,
            'category_id' => 4, 
            'subcategory_id' => 14,
            'ram_id' => null,
            'armazenamento_id' => 6,
            'stock' => 35,
            'image_path' => "images/sata.jpeg"
        ]);

        Product::create([
            'name' => 'HDD 3.5" Seagate IronWolf 4TB 5400RPM 256MB Cache 202MB/s SATA 6Gb/s',
            'manufacturer_id' => 25,
            'price' => 121.99,
            'sale_price' => 0,
            'description' => 'HDD',
            'reconditioned' => 0,
            'category_id' => 4, 
            'subcategory_id' => 14,
            'ram_id' => null,
            'armazenamento_id' => 3,
            'stock' => 35,
            'image_path' => "images/hdd.jpg"
        ]);
    

        
    }
}
