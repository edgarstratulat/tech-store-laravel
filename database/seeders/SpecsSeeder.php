<?php

namespace Database\Seeders;

use App\Models\Armazenamento;
use App\Models\cpuCooler;
use App\Models\GPU;
use App\Models\Motherboard;
use App\Models\PowerSupply;
use App\Models\Processor;
use App\Models\Ram;
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
            ['model' => 'Intel Core i5', 'cores' => 6,  'threads' => 12, 'tdp' => 65,  'socket' => 'LGA 1200'],
            ['model' => 'Intel Core i7', 'cores' => 8,  'threads' => 16,  'tdp' => 125, 'socket' => 'LGA 1200'],
            ['model' => 'AMD Ryzen 5',    'cores' => 6,  'threads' => 12,  'tdp' => 65,  'socket' => 'AM4'],
            ['model' => 'AMD Ryzen 7',    'cores' => 8,  'threads' => 16,   'tdp' => 105, 'socket' => 'AM4'],
            ['model' => 'Intel Core i9', 'cores' => 16, 'threads' => 24,  'tdp' => 125, 'socket' => 'LGA 1700'],
            ['model' => 'AMD Ryzen 9',    'cores' => 16, 'threads' => 32,  'tdp' => 105, 'socket' => 'AM4'],
            ['model' => 'Intel Core i3', 'cores' => 4,  'threads' => 8, 'tdp' => 58,  'socket' => 'LGA 1700'],
            ['model' => 'AMD Ryzen 3',     'cores' => 4,  'threads' => 8,   'tdp' => 65,  'socket' => 'AM4'],
            ['model' => 'Intel Core i5', 'cores' => 10, 'threads' => 16,  'tdp' => 65,  'socket' => 'LGA 1700'],
            ['model' => 'AMD Ryzen 5',    'cores' => 6,  'threads' => 12,  'tdp' => 105, 'socket' => 'AM5'], 
        ] as $cpu)

        Processor::create($cpu);

        foreach([
            ['format' => 'ATX', 'chipset' => 'Intel Z790', 'cpu_socket' => 'LGA 1700', 'ram_support' => 'DDR5', 'max_ram' => 192],
            ['format' => 'ATX', 'chipset' => 'AMD B850', 'cpu_socket' => 'AM5', 'ram_support' => 'DDR5', 'max_ram' => 256],
        ] as $motherboard)

        Motherboard::create($motherboard);

        foreach([
            ['category' => 'Placas gráficas Nvidia','model' => 'GeForce RTX 4090',   'vram' => 24, 'type_vram' => 'GDDR6X', 'interface' => 'PCIe 4.0 x16', 'tdp' => 450],
            ['category' => 'Placas gráficas AMD','model' => 'Radeon RX 9070XT',   'vram' => 16, 'type_vram' => 'GDDR6', 'interface' => 'PCIe 5.0 x16', 'tdp' => 317],
            ['category' => 'Placas gráficas Nvidia','model' => 'GeForce RTX 5090',   'vram' => 32, 'type_vram' => 'GDDR7', 'interface' => 'PCIe 5.0 x16', 'tdp' => 575],
        ] as $gpu)

        GPU::create($gpu);


        foreach([
            ['wattage' => 750, 'efficiency' => '80+ Gold','modular' => 'Full Modular',  'format' => 'ATX'],
        ] as $power)

        PowerSupply::create($power);

        foreach([
            ['socket' => 'AMD & INTEL','type' => 'Air Cooler', 'fan_rpm' => 2000, 'air_flow' => 42, 'rgb' => false],
            ['socket' => 'AMD & INTEL','type' => 'Water Cooler', 'fan_rpm' => 2100,  'air_flow' => 65.57, 'rgb' => true],

        ] as $cooler)

        cpuCooler::create($cooler);
    }
}
