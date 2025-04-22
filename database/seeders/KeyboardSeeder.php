<?php

namespace Database\Seeders;

use App\Models\Keyboard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeyboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach([
            [
                'interface' => 'USB',
                'type' => 'mechanical',
                'light' => true,
                'numpad' =>  false,
                'layout' => 'QWERTY PT-PT ISO'
            ],
            [
                'interface' => 'Bluetooth',
                'type' => 'membrane',
                'light' => true,
                'numpad' =>  false,
                'layout' => 'QWERTY PT-PT ISO'
            ],
        ] as $keyboard)

        Keyboard::create($keyboard);
    }
}
