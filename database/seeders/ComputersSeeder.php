<?php

namespace Database\Seeders;

use App\Models\Computer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComputersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
