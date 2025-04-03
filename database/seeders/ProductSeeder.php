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
            'name' => 'Smartphone Apple iPhone 16 Pro',
            'manufacturer_id' => 1,
            'price' => 1399.99,
            'sale_price' => 10,
            'description' => 'iPhone 16 Pro. Com um espetacular design em titânio. Controlo da câmara. Dolby Vision 4K a 120 fps. E o processador A18 Pro.',
            'reconditioned' => 0,
            'category_id' => 3,
            'subcategory_id' => 10,
            'stock' => 20,
            'image_path' => "images/6yBdrqYEofhYggD1raUtSxeGxtk6cT8qnJAuM1JP.jpg"
        ]);
        Product::create([
            'name' => 'Smartphone Apple iPhone 15',
            'manufacturer_id' => 1,
            'price' => 829.99,
            'sale_price' => 0,
            'description' => 'Inclui a Dynamic Island, câmara Principal de 48 MP e ligação     USB-C. Design resistente em alumínio e vidro infundido com cor.',
            'reconditioned' => 1,
            'category_id' => 3,
            'subcategory_id' => 10,
            'stock' => 20,
            'image_path' => "images/6yBdrqYEofhYggD1raUtSxeGxtk6cT8qnJAuM1JP.jpg"
        ]);
        Product::create([
            'name' => 'Smartphone Xiaomi 14T Pro',
            'manufacturer_id' => 3,
            'price' => 649.99,
            'sale_price' => 10,
            'description' => 'Android 14 | Mediatek Dimensity 9300+ | 512GB ROM | 12GB RAM | 3 Câmaras Traseiras | 1 Câmara Frontal | Bateria...',
            'reconditioned' => 0,
            'category_id' => 3,
            'subcategory_id' => 11,
            'stock' => 20,
            'image_path' => "images/wWkAHgvkDhOoGax2A5ZuFYcXXK3wXRbcK1JbE56E.jpg"
        ]);

        Product::create([
            'name' => 'Portátil Dell XPS 15',
            'manufacturer_id' => 4,
            'price' => 1899.99,
            'sale_price' => 15,
            'description' => 'High performance laptop',
            'reconditioned' => 0,
            'category_id' => 1,  
            'subcategory_id' => 3,  
            'stock' => 15,
            'image_path' => "images/dell_xps15.jpeg"
        ]);

        Product::create([
            'name' => 'Apple MacBook Pro 16"',
            'manufacturer_id' => 1,
            'price' => 2399.99,
            'sale_price' => 5,
            'description' => 'Professional-grade laptop with stunning display',
            'reconditioned' => 1,
            'category_id' => 1,  
            'subcategory_id' => 3, 
            'stock' => 12,
            'image_path' => "images/macbook_pro16.jpeg"
        ]);

        Product::create([
            'name' => 'Rato Logitech G Pro X Superlight',
            'manufacturer_id' => 5,
            'price' => 149.99,
            'sale_price' => 10,
            'description' => 'Wireless gaming mouse',
            'reconditioned' => 0,
            'category_id' => 2, 
            'subcategory_id' => 6,  
            'stock' => 30,
            'image_path' => "images/logitech_gpro_x.jpg"
        ]);

        Product::create([
            'name' => 'Monitor Samsung Odyssey G7',
            'manufacturer_id' => 2,
            'price' => 699.99,
            'sale_price' => 5,
            'description' => 'Curved QHD gaming monitor',
            'reconditioned' => 0,
            'category_id' => 2,  
            'subcategory_id' => 7,  
            'stock' => 25,
            'image_path' => "images/samsung_odyssey_g7.jpeg"
        ]);

        Product::create([
            'name' => 'Headphones Bose QuietComfort 35 II',
            'manufacturer_id' => 6,
            'price' => 299.99,
            'sale_price' => 10,
            'description' => 'Noise-cancelling wireless headphones',
            'reconditioned' => 0,
            'category_id' => 2,  
            'subcategory_id' => 8, 
            'stock' => 40,
            'image_path' => "images/bose_quietcomfort.jpeg"
        ]);

        Product::create([
            'name' => 'Processador Intel Core i9-13900K',
            'manufacturer_id' => 7,
            'price' => 799.99,
            'sale_price' => 15,
            'description' => 'High-end processor for gamers and professionals',
            'reconditioned' => 0,
            'category_id' => 4,  
            'subcategory_id' => 12,  
            'stock' => 50,
            'image_path' => "images/intel_core_i9.jpg"
        ]);

        Product::create([
            'name' => 'Memória RAM Corsair Vengeance LPX 16GB',
            'manufacturer_id' => 8,
            'price' => 79.99,
            'sale_price' => 5,
            'description' => '16GB DDR4 RAM for gaming',
            'reconditioned' => 0,
            'category_id' => 4,  
            'subcategory_id' => 13, 
            'stock' => 60,
            'image_path' => "images/corsair_vengeance.jpeg"
        ]);

        Product::create([
            'name' => 'SSD Samsung 970 EVO 1TB',
            'manufacturer_id' => 2,
            'price' => 129.99,
            'sale_price' => 10,
            'description' => 'High-speed solid-state drive',
            'reconditioned' => 0,
            'category_id' => 4, 
            'subcategory_id' => 14,  
            'stock' => 35,
            'image_path' => "images/samsung_970_evo.jpeg"
        ]);

        Product::create([
            'name' => 'Capa OtterBox iPhone 15 Case',
            'manufacturer_id' => 9,
            'price' => 29.99,
            'sale_price' => 0,
            'description' => 'Durable iPhone case for protection',
            'reconditioned' => 0,
            'category_id' => 5,  
            'subcategory_id' => 21,  
            'stock' => 100,
            'image_path' => "images/otterbox_case.jpeg"
        ]);

        Product::create([
            'name' => 'Powerbank Anker PowerCore 10000mAh',
            'manufacturer_id' => 10,
            'price' => 39.99,
            'sale_price' => 5,
            'description' => 'Portable charger for phones and tablets',
            'reconditioned' => 0,
            'category_id' => 5,  
            'subcategory_id' => 21,  
            'stock' => 150,
            'image_path' => "images/anker_powercore.jpeg"
        ]);

        Product::create([
            'name' => 'MSI MPG Z490 Gaming Edge WiFi',
            'manufacturer_id' => 11,
            'price' => 219.99,
            'sale_price' => 10,
            'description' => 'Motherboard with support for Intel 10th Gen Processors',
            'reconditioned' => 0,
            'category_id' => 4,  
            'subcategory_id' => 15, 
            'stock' => 25,
            'image_path' => 'images/msi_z490_motherboard.jpg'
        ]);
    
        Product::create([
            'name' => 'Motherboard ASUS ROG Strix Z690-E Gaming WiFi',
            'manufacturer_id' => 12,
            'price' => 399.99,
            'sale_price' => 12,
            'description' => 'Premium motherboard for Intel 12th Gen Processors with Wi-Fi 6E',
            'reconditioned' => 0,
            'category_id' => 4, 
            'subcategory_id' => 15,  
            'stock' => 15,
            'image_path' => 'images/asus_rog_strix_z690.jpg'
        ]);
    
        Product::create([
            'name' => 'Placa Gráfica NVIDIA GeForce RTX 3080',
            'manufacturer_id' => 13,
            'price' => 699.99,
            'sale_price' => 5,
            'description' => 'High-performance graphics card for 4K gaming',
            'reconditioned' => 0,
            'category_id' => 4,  
            'subcategory_id' => 16,  
            'stock' => 20,
            'image_path' => 'images/rtx_3080_graphics_card.jpg'
        ]);
    
        Product::create([
            'name' => 'Fonte de Alimentação EVGA SuperNOVA 850 G5, 80 Plus Gold 850W',
            'manufacturer_id' => 14,
            'price' => 139.99,
            'sale_price' => 10,
            'description' => 'Reliable power supply for high-performance PCs',
            'reconditioned' => 0,
            'category_id' => 4,  
            'subcategory_id' => 17, 
            'stock' => 40,
            'image_path' => 'images/evga_supernova_850w.jpg'
        ]);
    
        Product::create([
            'name' => 'Air Cooler CPU Cooler Master Hyper 212 EVO',
            'manufacturer_id' => 15,
            'price' => 34.99,
            'sale_price' => 5,
            'description' => 'Efficient CPU cooler for optimal performance',
            'reconditioned' => 0,
            'category_id' => 4, 
            'subcategory_id' => 18,  
            'stock' => 55,
            'image_path' => 'images/coolermaster_212_evo.jpeg'
        ]);
    
        Product::create([
            'name' => 'Caixa NZXT H510 Mid Tower ATX',
            'manufacturer_id' => 16,
            'price' => 79.99,
            'sale_price' => 15,
            'description' => 'Sleek and stylish PC case for custom builds',
            'reconditioned' => 0,
            'category_id' => 4,  
            'subcategory_id' => 19,  
            'stock' => 30,
            'image_path' => 'images/nzxt_h510_case.jpg'
        ]);

        Product::create([
            'name' => 'Computador Desktop Alienware Aurora R13',
            'manufacturer_id' => 17,
            'price' => 2399.99,
            'sale_price' => 10,
            'description' => 'High-performance gaming desktop with powerful hardware',
            'reconditioned' => 0,
            'category_id' => 1,  
            'subcategory_id' => 1,  
            'stock' => 15,
            'image_path' => 'images/alienware_aurora.jpg' 
        ]);

        Product::create([
            'name' => 'Computador Desktop HP Omen 30L',
            'manufacturer_id' => 18,
            'price' => 1899.99,
            'sale_price' => 12,
            'description' => 'Powerful gaming desktop with premium components',
            'reconditioned' => 0,
            'category_id' => 1, 
            'subcategory_id' => 1,
            'stock' => 20,
            'image_path' => 'images/hp_omen_30l.jpg'
        ]);

        Product::create([
            'name' => 'Portátil Razer Blade 15 Advanced',
            'manufacturer_id' => 19,
            'price' => 2199.99,
            'sale_price' => 5,
            'description' => 'Slim and powerful gaming laptop with 4K display',
            'reconditioned' => 0,
            'category_id' => 1, 
            'subcategory_id' => 3,  
            'stock' => 30,
            'image_path' => 'images/razer_blade_15_advanced.jpeg'
        ]);

        Product::create([
            'name' => 'Portátil MSI GE76 Raider',
            'manufacturer_id' => 11,
            'price' => 2599.99,
            'sale_price' => 10,
            'description' => 'High-end gaming laptop with Intel Core i9 and RTX 3080',
            'reconditioned' => 0,
            'category_id' => 1,  
            'subcategory_id' => 3, 
            'stock' => 0,
            'image_path' => 'images/msi_ge76_raider.jpeg'
        ]);

        Product::create([
            'name' => 'Apple MacBook Pro 16" M1 Pro',
            'manufacturer_id' => 1,
            'price' => 2499.99,
            'sale_price' => 8,
            'description' => 'Powerful MacBook with Apple Silicon M1 Pro chip for professionals',
            'reconditioned' => 0,
            'category_id' => 1,  
            'subcategory_id' => 3,  
            'stock' => 25,
            'image_path' => 'images/macbook_pro_16_m1_pro.jpeg'
        ]);

        Product::create([
            'name' => 'Portátil Lenovo ThinkPad X1 Carbon Gen 9',
            'manufacturer_id' => 20,
            'price' => 1899.99,
            'sale_price' => 7,
            'description' => 'Business-oriented laptop with Intel i7 and robust build quality',
            'reconditioned' => 0,
            'category_id' => 1,  
            'subcategory_id' => 3, 
            'stock' => 50,
            'image_path' => 'images/lenovo_thinkpad_x1_carbon.jpeg'
        ]);

        Product::create([
            'name' => 'Computador Desktop Corsair Vengeance i7200',
            'manufacturer_id' => 8,
            'price' => 1799.99,
            'sale_price' => 12,
            'description' => 'All-in-one gaming desktop with excellent cooling and performance',
            'reconditioned' => 0,
            'category_id' => 1, 
            'subcategory_id' => 1, 
            'stock' => 12,
            'image_path' => 'images/corsair_vengeance_i7200.jpeg'
        ]);

        Product::create([
            'name' => 'Portátil ASUS ROG Strix G15',
            'manufacturer_id' => 12,
            'price' => 1699.99,
            'sale_price' => 15,
            'description' => 'Gaming laptop with a Ryzen 9 5900HX processor and RTX 3070 GPU',
            'reconditioned' => 0,
            'category_id' => 1,  
            'subcategory_id' => 3,  
            'stock' => 35,
            'image_path' => 'images/asus_rog_strix_g15.jpeg'
        ]);

        Product::create([
            'name' => 'Computador Workstation HP Z4 G4 Workstation',
            'manufacturer_id' => 21,
            'price' => 2399.99,
            'sale_price' => 5,
            'description' => 'Powerful workstation for CAD and engineering applications',
            'reconditioned' => 0,
            'category_id' => 1,  
            'subcategory_id' => 4,  
            'stock' => 10,
            'image_path' => 'images/hp_z4_g4_workstation.jpeg'  
        ]);
    
        Product::create([
            'name' => 'Computador Workstation Dell Precision 5820 Tower Workstation',
            'manufacturer_id' => 4,
            'price' => 3199.99,
            'sale_price' => 8,
            'description' => 'High-end workstation designed for demanding software applications',
            'reconditioned' => 0,
            'category_id' => 1,  
            'subcategory_id' => 4, 
            'stock' => 8,
            'image_path' => 'images/dell_precision_5820.jpeg'
        ]);
    
        Product::create([
            'name' => 'Computador Workstation Lenovo ThinkStation P520',
            'manufacturer_id' => 20,
            'price' => 2999.99,
            'sale_price' => 10,
            'description' => 'Top-of-the-line workstation for professional creators',
            'reconditioned' => 0,
            'category_id' => 1, 
            'subcategory_id' => 4,  
            'stock' => 12,
            'image_path' => 'images/lenovo_thinkstation_p520.jpeg'
        ]);
    
        Product::create([
            'name' => 'Microcomputador Intel NUC 11 Performance Kit',
            'manufacturer_id' => 7,
            'price' => 699.99,
            'sale_price' => 5,
            'description' => 'Compact micro-PC for home or office use with great performance',
            'reconditioned' => 0,
            'category_id' => 1,  
            'subcategory_id' => 5, 
            'stock' => 20,
            'image_path' => 'images/intel_nuc_11.jpeg'
        ]);
    
        Product::create([
            'name' => 'Microcomputador Raspberry Pi 4 Model B',
            'manufacturer_id' => 22,
            'price' => 79.99,
            'sale_price' => 0,
            'description' => 'Ultra-low-cost micro-computer with open-source flexibility',
            'reconditioned' => 0,
            'category_id' => 1,  
            'subcategory_id' => 5,  
            'stock' => 100,
            'image_path' => 'images/raspberry_pi_4.jpeg'
        ]);
    
        Product::create([
            'name' => 'Microcomputador Beelink GT King Pro',
            'manufacturer_id' => 23,
            'price' => 159.99,
            'sale_price' => 5,
            'description' => 'Compact and powerful micro-PC for entertainment and light work',
            'reconditioned' => 0,
            'category_id' => 1, 
            'subcategory_id' => 5, 
            'stock' => 50,
            'image_path' => 'images/beelink_gt_king_pro.jpeg'
        ]);
    
        Product::create([
            'name' => 'Microcomputador MINISFORUM UM700',
            'manufacturer_id' => 24,
            'price' => 499.99,
            'sale_price' => 10,
            'description' => 'Compact mini-PC with Ryzen 7 3750H and 16GB RAM',
            'reconditioned' => 0,
            'category_id' => 1,  
            'subcategory_id' => 5,  
            'stock' => 30,
            'image_path' => 'images/minisforum_um700.jpeg'
        ]);

        
    }
}
