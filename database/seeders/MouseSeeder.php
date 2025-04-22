<?php

namespace Database\Seeders;

use App\Models\Mouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach([
            [
                'format' => 'righthand',
                'interface' => 'Wireless',
                'dpi' => 44000,
                'response_time' =>  0.5
            ],
            [
                'format' => 'righthand',
                'interface' => 'Bluetooth',
                'dpi' => 8000,
                'response_time' => 5
            ],
            [
                'format' => 'lefthand',
                'interface' => 'Bluetooth',
                'dpi' => 4000,
                'response_time' => 5
            ],
        ] as $mice)

        Mouse::create($mice);
    }
}
