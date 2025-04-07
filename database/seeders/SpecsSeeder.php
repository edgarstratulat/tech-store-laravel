<?php

namespace Database\Seeders;

use App\Models\Armazenamento;
use App\Models\Motherboard;
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
            ['size' => 4,  'type' => 'DDR3', 'frequency' => 1600, 'latency' => 11],
            ['size' => 8,  'type' => 'DDR3', 'frequency' => 1600, 'latency' => 11],
            ['size' => 8,  'type' => 'DDR4', 'frequency' => 2400, 'latency' => 17],
            ['size' => 8,  'type' => 'DDR4', 'frequency' => 3200, 'latency' => 16],
            ['size' => 16, 'type' => 'DDR4', 'frequency' => 3200, 'latency' => 16],
            ['size' => 16, 'type' => 'DDR4', 'frequency' => 3600, 'latency' => 18],
            ['size' => 16, 'type' => 'DDR5', 'frequency' => 4800, 'latency' => 40],
            ['size' => 32, 'type' => 'DDR4', 'frequency' => 3600, 'latency' => 18],
            ['size' => 32, 'type' => 'DDR5', 'frequency' => 5600, 'latency' => 40],
        ] as $ram)

        Ram::create($ram);

        foreach([
            ['size' => 512, 'type' => 'HDD', 'rotation_speed' => 1000],
            ['size' => 1000, 'type' => 'HDD', 'rotation_speed' => 1000],
            ['size' => 4000, 'type' => 'HDD','rotation_speed' => 7200],
            ['size' => 256, 'type' => '2.5" SATA', 'writing_speed' => 500, 'reading_speed' => 550],
            ['size' => 512, 'type' => '2.5" SATA', 'writing_speed' => 520, 'reading_speed' => 560],
            ['size' => 1000, 'type' => '2.5" SATA', 'writing_speed' => 530, 'reading_speed' => 550],
            ['size' => 512, 'type' => 'M.2', 'writing_speed' => 1500, 'reading_speed' => 2000],
            ['size' => 1000, 'type' => 'M.2', 'writing_speed' => 5000, 'reading_speed' => 5000],
            ['size' => 2000, 'type' => 'M.2', 'writing_speed' => 7000, 'reading_speed' => 7400],
            ['size' => 256, 'type' => 'M.2', 'writing_speed' => 520, 'reading_speed' => 540],
            ['size' => 512, 'type' => 'M.2', 'writing_speed' => 530, 'reading_speed' => 550],
            ['size' => 4000, 'type' => 'M.2', 'writing_speed' => 7100, 'reading_speed' => 7200],
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
            ['format' => 'ATX', 'chipset' => 'AMD X570', 'cpu_socket' => 'AM4', 'ram_support' => 'DDR4', 'max_ram' => 64],
            ['format' => 'ATX', 'chipset' => 'Intel Z490', 'cpu_socket' => 'LGA 1200', 'ram_support' => 'DDR4', 'max_ram' => 64],
            ['format' => 'ATX', 'chipset' => 'AMD B550', 'cpu_socket' => 'AM4', 'ram_support' => 'DDR4', 'max_ram' => 64],
        ] as $motherboard)

        Motherboard::create($motherboard);
    }
}
