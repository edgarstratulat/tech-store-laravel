<?php

namespace Database\Seeders;

use App\Models\Monitor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach([
            [
                'inclination' => true,
                'format' => 'curve',
                'ratio' => '16:9',
                'resolution' => '1920x1080',
                'inches' => 27,
                'refresh_rate' => 240,
                'response_time' => 1,
                'type_panel' => 'IPS'
            ],
            [
                'inclination' => true,
                'format' => 'flat',
                'ratio' => '16:9',
                'resolution' => '1920x1080',
                'inches' => 24.5,
                'refresh_rate' => 240,
                'response_time' => 1,
                'type_panel' => 'TN'
            ],
        ] as $monitor)

        Monitor::create($monitor);
    }
}
