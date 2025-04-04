<?php

namespace Database\Seeders;

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
    }
}
