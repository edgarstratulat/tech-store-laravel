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
            ['size' => '8GB', 'type' => 'DDR4', 'speed' => 3200],
            ['size' => '16GB', 'type' => 'DDR4', 'speed' => 3600],
            ['size' => '16GB', 'type' => 'DDR5', 'speed' => 5200],
            ['size' => '32GB', 'type' => 'DDR5', 'speed' => 5200],
            ['size' => '32GB', 'type' => 'DDR5', 'speed' => 6000],
            ['size' => '64GB', 'type' => 'DDR5', 'speed' => 6000],
        ] as $ram)

        Ram::create($ram);
    }
}
