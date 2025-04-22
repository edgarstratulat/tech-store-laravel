<?php

namespace Database\Seeders;

use App\Models\ComputerCase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComputerCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach([
            [
                'format' => 'Mid Tower',
                'motherboard_supported' => json_encode(['ATX', 'micro-ATX', 'ITX']),
                'number_front_fans' => 3,
                'number_lower_fans' => 0,
                'number_upper_fans' => 2,
                'number_rear_fans' => 1,
                'max_gpu_length' => 360,
                'max_cooler_height' => 165,
                'tempered_glass' => true,
            ],
            [
                'format' => 'Mini Tower',
                'motherboard_supported' => json_encode(['micro-ATX', 'ITX']),
                'number_front_fans' => 2,
                'number_lower_fans' => 3,
                'number_upper_fans' => 3,
                'number_rear_fans' => 1,
                'max_gpu_length' => 370,
                'max_cooler_height' => 170,
                'tempered_glass' => true,
            ],
            [
                'format' => 'Full Tower',
                'motherboard_supported' => json_encode(['EATX', 'ATX', 'micro-ATX', 'ITX']),
                'number_front_fans' => 3,
                'number_lower_fans' => 2,
                'number_upper_fans' => 3,
                'number_rear_fans' => 1,
                'max_gpu_length' => 420,
                'max_cooler_height' => 185,
                'tempered_glass' => true,
            ],
        ] as $pc_case)

        ComputerCase::create($pc_case);
    }
}
