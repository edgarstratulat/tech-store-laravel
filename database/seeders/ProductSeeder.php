<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cpuProducts = [
            [
                'name' => 'Processador Intel Core i5-10400F',
                'manufacturer_id' => 7,
                'price' => 129.99,
                'processor_id' => 1,
                'included_cooler' => true,
                'image_path' => 'images/intel_i5_10400f.jpeg'
            ],
            [
                'name' => 'Processador Intel Core i5-14400F',
                'manufacturer_id' => 7,
                'price' => 329.99,
                'processor_id' => 9,
                'included_cooler' => true,
                'image_path' => 'images/intel_i5_10400f.jpeg'
            ],
            [
                'name' => 'Processador Intel Core i7-11700K',
                'manufacturer_id' => 7,
                'price' => 339.99,
                'processor_id' => 2,
                'included_cooler' => false,
                'image_path' => 'images/intel_i7_11700k.jpeg'
            ],
            [
                'name' => 'Processador AMD Ryzen 5 5600X',
                'manufacturer_id' => 26,
                'price' => 189.99,
                'processor_id' => 3,
                'included_cooler' => true,
                'image_path' => 'images/ryzen_5_5600x.jpeg'
            ],
            [
                'name' => 'Processador AMD Ryzen 7 5800X',
                'manufacturer_id' => 26,
                'price' => 289.99,
                'processor_id' => 4,
                'included_cooler' => false,
                'image_path' => 'images/ryzen_7_5800x.jpeg'
            ],
            [
                'name' => 'Processador Intel Core i9-12900K',
                'manufacturer_id' => 7,
                'price' => 549.99,
                'processor_id' => 5,
                'included_cooler' => false,
                'image_path' => 'images/intel_i9_12900k.jpeg'
            ],
            [
                'name' => 'Processador AMD Ryzen 9 5950X',
                'manufacturer_id' => 26,
                'price' => 649.99,
                'processor_id' => 6,
                'included_cooler' => false,
                'image_path' => 'images/ryzen_9_5950x.jpeg'
            ],
            [
                'name' => 'Processador Intel Core i3-12100F',
                'manufacturer_id' => 7,
                'price' => 99.99,
                'processor_id' => 7,
                'included_cooler' => false,
                'image_path' => 'images/intel_i3_12100f.jpeg'
            ],
            [
                'name' => 'Processador AMD Ryzen 3 3100',
                'manufacturer_id' => 26,
                'price' => 89.99,
                'processor_id' => 8,
                'included_cooler' => true,
                'image_path' => 'images/ryzen_3_3100.jpeg'
            ],
            [
                'name' => 'Processador Intel Core i5-13400F',
                'manufacturer_id' => 7,
                'price' => 209.99,
                'processor_id' => 9,
                'included_cooler' => true,
                'image_path' => 'images/intel_i5_13400f.jpeg'
            ],
            [
                'name' => 'Processador AMD Ryzen 5 7600X',
                'manufacturer_id' => 26,
                'price' => 249.99,
                'processor_id' => 10,
                'included_cooler' => false,
                'image_path' => 'images/ryzen_5_7600x.jpeg'
            ],
            [
                'name' => 'Processador Intel Core Ultra 9 285K',
                'manufacturer_id' => 7,
                'price' => 659.99,
                'processor_id' => 12,
                'included_cooler' => false,
                'image_path' => 'images/ultra9.jpg'
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
                'subcategory_id' => 10,
                'processor_id' => $cpu['processor_id'],
                'included_cooler' => $cpu['included_cooler'],
                'stock' => rand(0, 50),
                'sku' => 'SKU' . rand(1000, 9999),
                'image_path' => $cpu['image_path'],
                'created_at' => Carbon::now()->subMinutes(rand(1, 1440)),
            ]);
        }

        $ramProducts = [
            [
                'name' => 'Memória RAM Corsair Vengeance LPX 16GB',
                'manufacturer_id' => 8,
                'price' => 79.99,
                'ram_id' => 1,
                'image_path' => "images/corsair_vengeance.jpeg"
            ],
            [
                'name' => 'Memória RAM Corsair Vengeance LPX 32GB',
                'manufacturer_id' => 8,
                'price' => 99.99,
                'ram_id' => 2,
                'image_path' => "images/corsair_vengeance.jpeg"
            ],
            [
                'name' => 'Memória RAM UDIMM Corsair Vengeance 32GB',
                'manufacturer_id' => 8,
                'price' => 99.99,
                'ram_id' => 3,
                'image_path' => "images/corsaira.jpg"
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
                'subcategory_id' => 11,
                'ram_id' => $ram['ram_id'],
                'stock' => rand(0, 50),
                'sku' => 'SKU' . rand(1000, 9999),
                'image_path' => $ram['image_path'],
                'created_at' => Carbon::now()->subMinutes(rand(1, 1440)),
            ]);
        }

        $armProducts = [
            [
                'name' => 'HDD 3.5" Seagate IronWolf 4TB 5400RPM 256MB Cache 202MB/s SATA 6Gb/s',
                'manufacturer_id' => 25,
                'price' => 121.99,
                'armazenamento_id' => 1,
                'image_path' => "images/hdd.jpg"
            ],
            [
                'name' => 'SSD M.2 Samsung 970 EVO 1TB',
                'manufacturer_id' => 2,
                'price' => 129.99,
                'armazenamento_id' => 2,
                'image_path' => "images/samsung_970_evo.jpeg"
            ],
            [
                'name' => 'SSD 2.5" Samsung 870 EVO 500GB MLC V-NAND SATA',
                'manufacturer_id' => 2,
                'price' => 64.99,
                'armazenamento_id' => 3,
                'image_path' => "images/sata.jpeg"
            ],
            [
                'name' => 'SSD 2.5" Samsung 870 EVO 1TB MLC V-NAND SATA',
                'manufacturer_id' => 2,
                'price' => 84.99,
                'armazenamento_id' => 4,
                'image_path' => "images/sata.jpeg"
            ],
            [
                'name' => 'SSD M.2 Samsung 970 EVO 2TB',
                'manufacturer_id' => 2,
                'price' => 149.99,
                'armazenamento_id' => 5,
                'image_path' => "images/samsung_970_evo.jpeg"
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
                'subcategory_id' => 12,
                'armazenamento_id' => $ssd['armazenamento_id'],
                'stock' => rand(0, 50),
                'sku' => 'SKU' . rand(1000, 9999),
                'image_path' => $ssd['image_path'],
                'created_at' => Carbon::now()->subMinutes(rand(1, 1440)),
            ]);
        }

        $moboProducts = [
            [
                'name' => 'Motherboard ATX Asus ROG Strix Z790-F Gaming WiFi II Skt1700',
                'manufacturer_id' => 12,
                'price' => 499.99,
                'motherboard_id' => 1,
                'bluetooth' => true,
                'wifi' => true,
                'image_path' => "images/mobo1.jpeg"
            ],
            [
                'name' => 'Motherboard ATX MSI MAG B850 Tomahawk Max WiFi SktAM5',
                'manufacturer_id' => 11,
                'price' => 279.99,
                'motherboard_id' => 2,
                'bluetooth' => true,
                'wifi' => true,
                'image_path' => "images/mobo2.jpeg"
            ],              
        ];
        
        foreach ($moboProducts as $mobo) {
            Product::create([
                'name' => $mobo['name'],
                'manufacturer_id' => $mobo['manufacturer_id'],
                'price' => $mobo['price'],
                'sale_price' => rand(0,30),
                'description' => $mobo['name'],
                'category_id' => 4, 
                'subcategory_id' => 13,
                'motherboard_id' => $mobo['motherboard_id'],
                'bluetooth' => $mobo['bluetooth'],
                'wifi' => $mobo['wifi'],
                'stock' => rand(0, 50),
                'sku' => 'SKU' . rand(1000, 9999),
                'image_path' => $mobo['image_path'],
                'created_at' => Carbon::now()->subMinutes(rand(1, 1440)),
            ]);
        }

        $gpuProducts = [
            [
                'name' => 'Placa Gráfica Asus NVIDIA GeForce RTX 4090 "Ada Lovelace" ROG Strix OC 24GB GDDR6X DLSS3 White Edition',
                'manufacturer_id' => 12,
                'price' => 2259.99,
                'gpu_id' => 1,
                'image_path' => "images/gpu1.jpg"
            ],
            [
                'name' => 'Placa Gráfica Sapphire AMD Radeon RX 9070 XT "RDNA 4" Pure OC 16GB GDDR6',
                'manufacturer_id' => 27,
                'price' => 769.99,
                'gpu_id' => 2,
                'image_path' => "images/gpu2.jpg"
            ], 
            [
                'name' => 'Placa Gráfica MSI NVIDIA GeForce RTX 5090 "Blackwell" Suprim SOC 32G GDDR7 DLSS4',
                'manufacturer_id' => 11,
                'price' => 3059.99,
                'gpu_id' => 3,
                'image_path' => "images/gpu3.jpg"
            ],              
        ];
        
        foreach ($gpuProducts as $gpu) {
            Product::create([
                'name' => $gpu['name'],
                'manufacturer_id' => $gpu['manufacturer_id'],
                'price' => $gpu['price'],
                'sale_price' => rand(0,30),
                'description' => $gpu['name'],
                'category_id' => 4, 
                'subcategory_id' => 14,
                'gpu_id' => $gpu['gpu_id'],
                'stock' => rand(0, 50),
                'sku' => 'SKU' . rand(1000, 9999),
                'image_path' => $gpu['image_path'],
                'created_at' => Carbon::now()->subMinutes(rand(1, 1440)),
            ]);
        }

        $powerSupplyProduts = [
            [
                'name' => 'Fonte de Alimentação ATX Corsair RM750x Shift Series 750W 80 Plus Gold Full Modular',
                'manufacturer_id' => 8,
                'price' => 157.99,
                'powersupply_id' => 1,
                'image_path' => "images/fonte1.jpg"
            ],            
        ];
        
        foreach ($powerSupplyProduts as $power) {
            Product::create([
                'name' => $power['name'],
                'manufacturer_id' => $power['manufacturer_id'],
                'price' => $power['price'],
                'sale_price' => rand(0,30),
                'description' => $power['name'],
                'category_id' => 4, 
                'subcategory_id' => 15,
                'powersupply_id' => $power['powersupply_id'],
                'stock' => rand(0, 50),
                'sku' => 'SKU' . rand(1000, 9999),
                'image_path' => $power['image_path'],
                'created_at' => Carbon::now()->subMinutes(rand(1, 1440)),
            ]);
        }

        $cpuCoolerProduts = [
            [
                'name' => 'Air Cooler CPU Cooler Master Hyper 212 Black Edition',
                'manufacturer_id' => 15,
                'price' => 39.99,
                'cpu_cooler_id' => 1,
                'image_path' => "images/cooler1.jpg"
            ],  
            [
                'name' => 'Water Cooler Corsair iCUE H150i Elite Capellix XT',
                'manufacturer_id' => 8,
                'price' => 179.99,
                'cpu_cooler_id' => 2,
                'image_path' => "images/cooler2.jpg"
            ],          
        ];
        
        foreach ($cpuCoolerProduts as $cooler) {
            Product::create([
                'name' => $cooler['name'],
                'manufacturer_id' => $cooler['manufacturer_id'],
                'price' => $cooler['price'],
                'sale_price' => rand(0,30),
                'description' => $cooler['name'],
                'category_id' => 4, 
                'subcategory_id' => 16,
                'cpu_cooler_id' => $cooler['cpu_cooler_id'],
                'stock' => rand(0, 50),
                'sku' => 'SKU' . rand(1000, 9999),
                'image_path' => $cooler['image_path'],
                'created_at' => Carbon::now()->subMinutes(rand(1, 1440)),
            ]);
        }

        $caseProducts = [
            [
                'name' => 'Caixa ATX NZXT H510 Flow RGB Vidro Temperado Branca',
                'manufacturer_id' => 16,
                'price' => 144.99,
                'pc_case_id' => 1,
                'image_path' => "images/caixa1.jpg"
            ],
            [
                'name' => 'Caixa ATX Lian Li O11D Dynamic Mini Vidro Temperado Preta',
                'manufacturer_id' => 28,
                'price' => 119.99,
                'pc_case_id' => 2,
                'image_path' => "images/caixa2.jpg"
            ],
            [
                'name' => 'Caixa Extended-ATX Lian Li PC-O11 Dynamic',
                'manufacturer_id' => 28,
                'price' => 169.99,
                'pc_case_id' => 3,
                'image_path' => "images/caixa3.jpg"
            ],
        ];
        
        foreach ($caseProducts as $case) {
            Product::create([
                'name' => $case['name'],
                'manufacturer_id' => $case['manufacturer_id'],
                'price' => $case['price'],
                'sale_price' => rand(0, 30),
                'description' => $case['name'],
                'category_id' => 4,
                'subcategory_id' => 17, 
                'pc_case_id' => $case['pc_case_id'],
                'stock' => rand(0, 50),
                'sku' => 'SKU' . rand(1000, 9999),
                'image_path' => $case['image_path'],
                'created_at' => Carbon::now()->subMinutes(rand(1, 1440)),
            ]);
        }

        $phoneProducts = [
            [
                'name' => 'Smartphone Apple iPhone 16 Pro Max 6.9" 256GB Titânio Deserto',
                'manufacturer_id' => 1,
                'price' => 1399.99,
                'smartphone_id' => 1,
                'subcategory_id' => 8,
                'image_path' => "images/phone1.jpg"
            ],
            [
                'name' => 'Smartphone Samsung Galaxy S25 Ultra 6.9" 12GB/512GB Dual SIM Preto Titânio',
                'manufacturer_id' => 2,
                'price' => 1619.99,
                'smartphone_id' => 2,
                'subcategory_id' => 9,
                'image_path' => "images/phone2.jpg"
            ],
            [
                'name' => 'Smartphone Google Pixel 9 Pro 6.8" 16GB/128GB Dual SIM Preto - Obsidian',
                'manufacturer_id' => 29,
                'price' => 999.99,
                'smartphone_id' => 3,
                'subcategory_id' => 9,
                'image_path' => "images/phone3.jpg"
            ],
        ];
        
        foreach ($phoneProducts as $phone) {
            Product::create([
                'name' => $phone['name'],
                'manufacturer_id' => $phone['manufacturer_id'],
                'price' => $phone['price'],
                'sale_price' => rand(0, 30),
                'description' => $phone['name'],
                'category_id' => 3,
                'subcategory_id' => $phone['subcategory_id'], 
                'smartphone_id' => $phone['smartphone_id'],
                'stock' => rand(0, 50),
                'sku' => 'SKU' . rand(1000, 9999),
                'image_path' => $phone['image_path'],
                'created_at' => Carbon::now()->subMinutes(rand(1, 1440)),
            ]);
        }

        $pcProducts = [
            [
                'name' => 'Computador Desktop XPTO Série I by MaRca | Intel i5 | 32GB DDR5 | 9070XT | 1TB SSD',
                'manufacturer_id' => 30,
                'price' => 1399.99,
                'computer_id' => 1,
                'subcategory_id' => 1,
                'image_path' => "images/pc1.jpg"
            ],
            [
                'name' => 'Apple MacBook Air 13.6" | M3 CPU 8-core, GPU 8-core | SSD 256GB | 8GB RAM | Meia-Noite + Adaptador USB-C 30W',
                'manufacturer_id' => 1,
                'price' => 1229.99,
                'computer_id' => 2,
                'subcategory_id' => 2,
                'image_path' => "images/pc2.jpg"
            ],
            [
                'name' => 'Portátil MSI 18" Titan 18 HX AI A2XWJG-274PT Core Black + Rato MSI Gaming + Mochila Titan Gaming + MSI Dual Drive 256GB + Keychain',
                'manufacturer_id' => 11,
                'price' => 5399.99,
                'computer_id' => 3,
                'subcategory_id' => 2,
                'image_path' => "images/pc3.jpg"
            ],
        ];
        
        foreach ($pcProducts as $pc) {
            Product::create([
                'name' => $pc['name'],
                'manufacturer_id' => $pc['manufacturer_id'],
                'price' => $pc['price'],
                'sale_price' => rand(1,15),
                'description' => $pc['name'],
                'category_id' => 1,
                'subcategory_id' => $pc['subcategory_id'], 
                'computer_id' => $pc['computer_id'],
                'stock' => rand(0, 50),
                'sku' => 'SKU' . rand(1000, 9999),
                'image_path' => $pc['image_path'],
                'created_at' => Carbon::now()->subMinutes(rand(1, 1440)),
            ]);
        }

        $miceProducts = [
            [
                'name' => 'Rato Óptico Logitech MX Master 3s for Mac Wireless/Bluetooth 8000DPI White',
                'manufacturer_id' => 5,
                'price' => 99.99,
                'mouse_id' => 2,
                'subcategory_id' => 4,
                'image_path' => "images/mice1.jpg"
            ],
            [
                'name' => 'Rato Óptico Logitech G Pro X Superlight 2 Wireless 44000DPI Magenta',
                'manufacturer_id' => 5,
                'price' => 168.99,
                'mouse_id' => 1,
                'subcategory_id' => 4,
                'image_path' => "images/mice2.jpg"
            ],
        ];
        
        foreach ($miceProducts as $peri) {
            Product::create([
                'name' => $peri['name'],
                'manufacturer_id' => $peri['manufacturer_id'],
                'price' => $peri['price'],
                'sale_price' => rand(1,15),
                'description' => $peri['name'],
                'category_id' => 2,
                'subcategory_id' => $peri['subcategory_id'], 
                'mouse_id' => $peri['mouse_id'],
                'stock' => rand(0, 50),
                'sku' => 'SKU' . rand(1000, 9999),
                'image_path' => $peri['image_path'],
                'created_at' => Carbon::now()->subMinutes(rand(1, 1440)),
            ]);
        }
        
            
    }
}
