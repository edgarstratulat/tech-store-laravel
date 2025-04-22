<?php

namespace Database\Seeders;

use App\Models\GPU;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GPUSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach([
            [
                'category' => 'Placas gráficas Nvidia',
                'model' => 'GeForce RTX 4090',
                'vram' => 24,
                'type_vram' => 'GDDR6X',
                'interface' => 'PCIe 4.0 x16',
                'tdp' => 450
            ],
            [
                'category' => 'Placas gráficas AMD',
                'model' => 'Radeon RX 9070XT',
                'vram' => 16,
                'type_vram' => 'GDDR6',
                'interface' => 'PCIe 5.0 x16',
                'tdp' => 317
            ],
            [
                'category' => 'Placas gráficas Nvidia',
                'model' => 'GeForce RTX 5090',
                'vram' => 32,
                'type_vram' => 'GDDR7',
                'interface' => 'PCIe 5.0 x16',
                'tdp' => 575
            ],
        ] as $gpu)

        GPU::create($gpu);
    }
}
