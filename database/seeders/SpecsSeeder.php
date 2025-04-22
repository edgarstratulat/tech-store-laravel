<?php

namespace Database\Seeders;

use App\Models\Armazenamento;
use App\Models\Computer;
use App\Models\ComputerCase;
use App\Models\cpuCooler;
use App\Models\GPU;
use App\Models\Keyboard;
use App\Models\Monitor;
use App\Models\Motherboard;
use App\Models\Mouse;
use App\Models\PowerSupply;
use App\Models\Processor;
use App\Models\Ram;
use App\Models\Smartphone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach([
        ['size' => 16, 'type' => 'DDR4', 'frequency' => 3200, 'latency' => 16],
        ['size' => 32, 'type' => 'DDR4', 'frequency' => 3600, 'latency' => 18],
        ['size' => 32, 'type' => 'DDR5', 'frequency' => 5600, 'latency' => 40],
        ['size' => 8, 'type' => 'DDR4', 'frequency' => 3200, 'latency' => 16],
        ['size' => 64, 'type' => 'DDR5', 'frequency' => 6000, 'latency' => 32],
        ] as $ram)

        Ram::create($ram);

        foreach([
            ['size' => 4000, 'type' => 'HDD','rotation_speed' => 7200],
            ['size' => 1000, 'type' => 'M.2', 'writing_speed' => 5000, 'reading_speed' => 5000],
            ['size' => 512, 'type' => '2.5" SATA', 'writing_speed' => 520, 'reading_speed' => 560],
            ['size' => 1000, 'type' => '2.5" SATA', 'writing_speed' => 530, 'reading_speed' => 550],
            ['size' => 2000, 'type' => 'M.2', 'writing_speed' => 7000, 'reading_speed' => 7400],
        ] as $armazenamento)

        Armazenamento::create($armazenamento);

        foreach([
            [
                'model' => 'Intel Core i5',
                'cores' => 6, 
                'threads' => 12,
                'tdp' => 65, 
                'socket' => 'LGA 1200'
            ],
            [
                'model' => 'Intel Core i7',
                'cores' => 8, 
                'threads' => 16, 
                'tdp' => 125,
                'socket' => 'LGA 1200'
            ],
            [
                'model' => 'AMD Ryzen 5',
                'cores' => 6, 
                'threads' => 12,
                'tdp' => 65,
                'socket' => 'AM4'
            ],
            [
                'model' => 'AMD Ryzen 7',
                'cores' => 8,
                'threads' => 16,
                'tdp' => 105,
                'socket' => 'AM4'
            ],
            [
                'model' => 'Intel Core i9',
                'cores' => 16,
                'threads' => 24,
                'tdp' => 125,
                'socket' =>
                'LGA 1700'
            ],
            [
                'model' => 'AMD Ryzen 9',
                'cores' => 16,
                'threads' => 32,
                'tdp' => 105,
                'socket' => 'AM4'
            ],
            [
                'model' => 'Intel Core i3',
                'cores' => 4, 
                'threads' => 8,
                'tdp' => 58,
                'socket' => 'LGA 1700'
            ],
            [
                'model' => 'AMD Ryzen 3',
                'cores' => 4,  'threads' => 8,
                'tdp' => 65,
                'socket' => 'AM4'
            ],
            [
                'model' => 'Intel Core i5',
                'cores' => 10,
                'threads' => 16,
                'tdp' => 65,
                'socket' => 'LGA 1700'
            ],
            [
                'model' => 'AMD Ryzen 5',
                'cores' => 6,
                'threads' => 12,
                'tdp' => 105,
                'socket' => 'AM5'
            ],
            [
                'model' => 'Apple M',
                'cores' => 8,
                'threads' => 8,
                'tdp' => 105,
                'socket' => 'ARM'
            ], 
            [
                'model' => 'Intel Core Ultra 9',
                'cores' => 24,
                'threads' => 8,
                'tdp' => 55,
                'socket' => 'LGA 1151'
            ], 
        ] as $cpu)

        Processor::create($cpu);

        foreach([
            [
                'format' => 'ATX',
                'chipset' => 'Intel Z790',
                'cpu_socket' => 'LGA 1700',
                'ram_support' => 'DDR5', 
                'max_ram' => 192,
                'wifi' => true,
                'bluetooth' => true,
            ],
            [
                'format' => 'ATX',
                'chipset' => 'AMD B850',
                'cpu_socket' => 'AM5',
                'ram_support' => 'DDR5',
                'max_ram' => 256,
                'wifi' => true,
                'bluetooth' => true
            ],
        ] as $motherboard)

        Motherboard::create($motherboard);

        foreach([
            [
                'category' => 'Placas gráficas Nvidia',
                'model' => 'GeForce RTX 4090',
                'vram' => 24,
                'type_vram' => 'GDDR6X',
                'interface' => 'PCIe 4.0 x16',
                'tdp' => 450
            ],
            [
                'category' => 'Placas gráficas AMD',
                'model' => 'Radeon RX 9070XT',
                'vram' => 16,
                'type_vram' => 'GDDR6',
                'interface' => 'PCIe 5.0 x16',
                'tdp' => 317
            ],
            [
                'category' => 'Placas gráficas Nvidia',
                'model' => 'GeForce RTX 5090',
                'vram' => 32,
                'type_vram' => 'GDDR7',
                'interface' => 'PCIe 5.0 x16',
                'tdp' => 575
            ],
        ] as $gpu)

        GPU::create($gpu);


        foreach([
            [
                'wattage' => 750,
                'efficiency' => '80+ Gold',
                'modular' => 'Full Modular',
                'format' => 'ATX'
            ],
        ] as $power)

        PowerSupply::create($power);

        foreach([
            [
                'socket' => 'AMD',
                'type' => 'Air Cooler',
                'fan_rpm' => 2000,
                'air_flow' => 42,
                'rgb' => false
            ],
            [
                'socket' => 'Intel',
                'type' => 'Water Cooler',
                'fan_rpm' => 2100,
                'air_flow' => 65.57,
                'rgb' => true
            ],

        ] as $cooler)

        cpuCooler::create($cooler);

            
        foreach([
            [
                'format' => 'Mid Tower',
                'motherboard_supported' => json_encode(['ATX', 'micro-ATX', 'ITX']),
                'number_front_fans' => 3,
                'number_lower_fans' => 0,
                'number_upper_fans' => 2,
                'number_rear_fans' => 1,
                'max_gpu_length' => 360,
                'max_cooler_height' => 165,
                'tempered_glass' => true,
            ],
            [
                'format' => 'Mini Tower',
                'motherboard_supported' => json_encode(['micro-ATX', 'ITX']),
                'number_front_fans' => 2,
                'number_lower_fans' => 3,
                'number_upper_fans' => 3,
                'number_rear_fans' => 1,
                'max_gpu_length' => 370,
                'max_cooler_height' => 170,
                'tempered_glass' => true,
            ],
            [
                'format' => 'Full Tower',
                'motherboard_supported' => json_encode(['EATX', 'ATX', 'micro-ATX', 'ITX']),
                'number_front_fans' => 3,
                'number_lower_fans' => 2,
                'number_upper_fans' => 3,
                'number_rear_fans' => 1,
                'max_gpu_length' => 420,
                'max_cooler_height' => 185,
                'tempered_glass' => true,
            ],
        ] as $pc_case)

        ComputerCase::create($pc_case);

        foreach([
            [        
                'model' => 'Iphone 16 Pro Max',
                'ram' => 8,
                'storage' => 128,
                'family_processor' => 'Apple',
                'processor' => 'A18',
                'SIM' => 'Dual SIM',
                'operating_system' => 'iOS',
                'screen_resolution' => '2868x1320',
                'screen_inches' => 6.9,
                'screen_hz' => 120,
                'screen_type' => 'OLED',
                '5G' => true,
                'NFC' => true,
            ],
            [
                'model' => 'Samsung Galaxy S25 Ultra',
                'ram' => 12,
                'storage' => 512,
                'family_processor' => 'Qualcomm',
                'processor' => 'Snapdragon 8 Elite',
                'SIM' => 'Dual SIM',
                'operating_system' => 'Android 15',
                'screen_resolution' => '3088x1440',
                'screen_inches' => 6.9,
                'screen_hz' => 120,
                'screen_type' => 'AMOLED',
                '5G' => true,
                'NFC' => true,
            ],
            [
                'model' => 'Google Pixel 9 Pro',
                'ram' => 16,
                'storage' => 128,
                'family_processor' => 'Google',
                'processor' => 'Tensor G4',
                'SIM' => 'Dual SIM',
                'operating_system' => 'Android 15',
                'screen_resolution' => '1280 x 2856',
                'screen_inches' => 6.8,
                'screen_hz' => 120,
                'screen_type' => 'OLED',
                '5G' => true,
                'NFC' => true,
            ],
        ] as $phone)

        Smartphone::create($phone);

        foreach([
            [
                'processor' => 1,
                'motherboard' => 1,
                'ram' => 3,
                'storage' => 4,
                'gpu' => 2,
                'case' => 3,
                'powersupply' => 1,
                'integrated_gpu' => 'notavailable',
            ],
            [
                'processor' => 11,
                'ram' => 4,
                'storage' => 3,
                'integrated_gpu' => 'Apple GPU'
            ],
            [
                'processor' => 12,
                'ram' => 5,
                'storage' => 4,
                'gpu' => 3,
                'integrated_gpu' => 'Apple GPU',
            ],
        ] as $pc)

        Computer::create($pc);

        foreach([
            [
                'format' => 'righthand',
                'interface' => 'Wireless',
                'dpi' => 44000,
                'response_time' =>  0.5
            ],
            [
                'format' => 'righthand',
                'interface' => 'Bluetooth',
                'dpi' => 8000,
                'response_time' => 5
            ],
            [
                'format' => 'lefthand',
                'interface' => 'Bluetooth',
                'dpi' => 4000,
                'response_time' => 5
            ],
        ] as $mice)

        Mouse::create($mice);


        foreach([
            [
                'interface' => 'USB',
                'type' => 'mechanical',
                'light' => true,
                'numpad' =>  false,
                'layout' => 'QWERTY PT-PT ISO'
            ],
            [
                'interface' => 'Bluetooth',
                'type' => 'membrane',
                'light' => true,
                'numpad' =>  false,
                'layout' => 'QWERTY PT-PT ISO'
            ],
        ] as $keyboard)

        Keyboard::create($keyboard);

        foreach([
            [
                'inclination' => true,
                'format' => 'curve',
                'ratio' => '16:9',
                'resolution' => '1920x1080',
                'inches' => 27,
                'refresh_rate' => 240,
                'response_time' => 1,
                'type_panel' => 'IPS'
            ],
            [
                'inclination' => true,
                'format' => 'flat',
                'ratio' => '16:9',
                'resolution' => '1920x1080',
                'inches' => 24.5,
                'refresh_rate' => 240,
                'response_time' => 1,
                'type_panel' => 'TN'
            ],
        ] as $monitor)

        Monitor::create($monitor);
    }
}
