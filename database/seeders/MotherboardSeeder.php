<?php

namespace Database\Seeders;

use App\Models\Motherboard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotherboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
