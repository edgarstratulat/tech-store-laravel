<?php

namespace Database\Seeders;

use App\Models\Ram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RamSeeder extends Seeder
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
    }
}
