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
                'included_cooler' => true,
                'image_path' => 'images/intel_i5_10400f.jpeg'
            ],
            [
                'name' => 'Intel Core i5-14400F',
                'manufacturer_id' => 7,
                'price' => 329.99,
                'cpu_id' => 1,
                'included_cooler' => true,
                'image_path' => 'images/intel_i5_10400f.jpeg'
            ],
            [
                'name' => 'Intel Core i7-11700K',
                'manufacturer_id' => 7,
                'price' => 339.99,
                'cpu_id' => 2,
                'included_cooler' => false,
                'image_path' => 'images/intel_i7_11700k.jpeg'
            ],
            [
                'name' => 'AMD Ryzen 5 5600X',
                'manufacturer_id' => 26,
                'price' => 189.99,
                'cpu_id' => 3,
                'included_cooler' => true,
                'image_path' => 'images/ryzen_5_5600x.jpeg'
            ],
            [
                'name' => 'AMD Ryzen 7 5800X',
                'manufacturer_id' => 26,
                'price' => 289.99,
                'cpu_id' => 4,
                'included_cooler' => false,
                'image_path' => 'images/ryzen_7_5800x.jpeg'
            ],
            [
                'name' => 'Intel Core i9-12900K',
                'manufacturer_id' => 7,
                'price' => 549.99,
                'cpu_id' => 5,
                'included_cooler' => false,
                'image_path' => 'images/intel_i9_12900k.jpeg'
            ],
            [
                'name' => 'AMD Ryzen 9 5950X',
                'manufacturer_id' => 26,
                'price' => 649.99,
                'cpu_id' => 6,
                'included_cooler' => false,
                'image_path' => 'images/ryzen_9_5950x.jpeg'
            ],
            [
                'name' => 'Intel Core i3-12100F',
                'manufacturer_id' => 7,
                'price' => 99.99,
                'cpu_id' => 7,
                'included_cooler' => false,
                'image_path' => 'images/intel_i3_12100f.jpeg'
            ],
            [
                'name' => 'AMD Ryzen 3 3100',
                'manufacturer_id' => 26,
                'price' => 89.99,
                'cpu_id' => 8,
                'included_cooler' => true,
                'image_path' => 'images/ryzen_3_3100.jpeg'
            ],
            [
                'name' => 'Intel Core i5-13400F',
                'manufacturer_id' => 7,
                'price' => 209.99,
                'cpu_id' => 9,
                'included_cooler' => true,
                'image_path' => 'images/intel_i5_13400f.jpeg'
            ],
            [
                'name' => 'AMD Ryzen 5 7600X',
                'manufacturer_id' => 26,
                'price' => 249.99,
                'cpu_id' => 10,
                'included_cooler' => false,
                'image_path' => 'images/ryzen_5_7600x.jpeg'
            ]
        ];
        
        foreach ($cpuProducts as $cpu) {
            Product::create([
                'name' => $cpu['name'],
                'manufacturer_id' => $cpu['manufacturer_id'],
                'price' => $cpu['price'],
                'sale_price' => rand(0,30),
                'description' => $cpu['name'] . ' - Processador potente para gaming e produtividade.',
                'category_id' => 4, 
                'subcategory_id' => 12,
                'cpu_id' => $cpu['cpu_id'],
                'included_cooler' => $cpu['included_cooler'],
                'stock' => rand(0, 50),
                'image_path' => $cpu['image_path'],
            ]);
        }

        $ramProducts = [
            [
                'name' => 'Memória RAM Corsair Vengeance LPX 16GB',
                'manufacturer_id' => 8,
                'price' => 79.99,
                'ram_id' => 5,
                'image_path' => "images/corsair_vengeance.jpeg"
            ],
            [
                'name' => 'Memória RAM UDIMM Corsair Vengeance 32GB',
                'manufacturer_id' => 8,
                'price' => 99.99,
                'ram_id' => 9,
                'image_path' => "images/corsaira.jpg"
            ],
            [
                'name' => 'Memória RAM Corsair Vengeance LPX 32GB',
                'manufacturer_id' => 8,
                'price' => 99.99,
                'ram_id' => 8,
                'image_path' => "images/corsair_vengeance.jpeg"
            ],
            
        ];
        
        foreach ($ramProducts as $ram) {
            Product::create([
                'name' => $ram['name'],
                'manufacturer_id' => $ram['manufacturer_id'],
                'price' => $ram['price'],
                'sale_price' => rand(0,30),
                'description' => $ram['name'] . ' oferece frequências mais rápidas, maiores capacidades e melhor desempenho',
                'category_id' => 4, 
                'subcategory_id' => 13,
                'ram_id' => $ram['ram_id'],
                'stock' => rand(0, 50),
                'image_path' => $ram['image_path'],
            ]);
        }

        $armProducts = [
            [
                'name' => 'SSD M.2 Samsung 970 EVO 1TB',
                'manufacturer_id' => 2,
                'price' => 129.99,
                'armazenamento_id' => 8,
                'image_path' => "images/samsung_970_evo.jpeg"
            ],
            [
                'name' => 'SSD 2.5" Samsung 870 EVO 500GB MLC V-NAND SATA',
                'manufacturer_id' => 2,
                'price' => 64.99,
                'armazenamento_id' => 5,
                'image_path' => "images/sata.jpeg"
            ],
            [
                'name' => 'SSD M.2 Samsung 970 EVO 2TB',
                'manufacturer_id' => 2,
                'price' => 149.99,
                'armazenamento_id' => 9,
                'image_path' => "images/samsung_970_evo.jpeg"
            ],
            [
                'name' => 'SSD 2.5" Samsung 870 EVO 1TB MLC V-NAND SATA',
                'manufacturer_id' => 2,
                'price' => 84.99,
                'armazenamento_id' => 6,
                'image_path' => "images/sata.jpeg"
            ],
            [
                'name' => 'HDD 3.5" Seagate IronWolf 4TB 5400RPM 256MB Cache 202MB/s SATA 6Gb/s',
                'manufacturer_id' => 25,
                'price' => 121.99,
                'armazenamento_id' => 3,
                'image_path' => "images/hdd.jpg"
            ],
        ];
        
        foreach ($armProducts as $ssd) {
            Product::create([
                'name' => $ssd['name'],
                'manufacturer_id' => $ssd['manufacturer_id'],
                'price' => $ssd['price'],
                'sale_price' => rand(0,30),
                'description' => $ssd['name'] . ' oferece frequências mais rápidas, maiores capacidades e melhor desempenho',
                'category_id' => 4, 
                'subcategory_id' => 14,
                'armazenamento_id' => $ssd['armazenamento_id'],
                'stock' => rand(0, 50),
                'image_path' => $ssd['image_path'],
            ]);
        }
            
    }
}
