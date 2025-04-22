<?php

namespace Database\Seeders;

use App\Models\cpuCooler;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cpuCoolerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
