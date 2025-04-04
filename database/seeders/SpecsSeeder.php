<?php

namespace Database\Seeders;

use App\Models\Armazenamento;
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

        foreach([
            ['size' => 256, 'type' => '2.5" SATA', 'writing_speed' => 500, 'reading_speed' => 550],
            ['size' => 512, 'type' => '2.5" SATA', 'writing_speed' => 520, 'reading_speed' => 560],
            ['size' => 1000, 'type' => '2.5" SATA', 'writing_speed' => 530, 'reading_speed' => 550],
            ['size' => 512, 'type' => 'M.2 2280', 'writing_speed' => 1500, 'reading_speed' => 2000],
            ['size' => 1000, 'type' => 'M.2 2280', 'writing_speed' => 5000, 'reading_speed' => 5000],
            ['size' => 2000, 'type' => 'M.2 2280', 'writing_speed' => 7000, 'reading_speed' => 7400],
            ['size' => 256, 'type' => 'M.2 SATA', 'writing_speed' => 520, 'reading_speed' => 540],
            ['size' => 512, 'type' => 'M.2 SATA', 'writing_speed' => 530, 'reading_speed' => 550],
            ['size' => 4000, 'type' => 'M.2 22110', 'writing_speed' => 7100, 'reading_speed' => 7200],
        ] as $armazenamento)

        Armazenamento::create($armazenamento);
    }
}
