<?php

namespace Database\Seeders;

use App\Models\PowerSupply;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PowerSupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach([
            [
                'wattage' => 750,
                'efficiency' => '80+ Gold',
                'modular' => 'Full Modular',
                'format' => 'ATX'
            ],
        ] as $power)

        PowerSupply::create($power);
    }
}
