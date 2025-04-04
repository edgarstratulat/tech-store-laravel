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
            ['size' => '4GB',  'type' => 'DDR3', 'frequency' => 1600, 'latency' => 'CL11'],
            ['size' => '8GB',  'type' => 'DDR3', 'frequency' => 1600, 'latency' => 'CL11'],
            ['size' => '8GB',  'type' => 'DDR4', 'frequency' => 2400, 'latency' => 'CL17'],
            ['size' => '8GB',  'type' => 'DDR4', 'frequency' => 3200, 'latency' => 'CL16'],
            ['size' => '16GB', 'type' => 'DDR4', 'frequency' => 3200, 'latency' => 'CL16'],
            ['size' => '16GB', 'type' => 'DDR4', 'frequency' => 3600, 'latency' => 'CL18'],
            ['size' => '16GB', 'type' => 'DDR5', 'frequency' => 4800, 'latency' => 'CL40'],
            ['size' => '32GB', 'type' => 'DDR4', 'frequency' => 3600, 'latency' => 'CL18'],
            ['size' => '32GB', 'type' => 'DDR5', 'frequency' => 5600, 'latency' => 'CL40'],
        ] as $ram)

        Ram::create($ram);
    }
}
