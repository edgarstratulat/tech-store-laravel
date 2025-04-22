<?php

namespace Database\Seeders;

use App\Models\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach([
            ['size' => 4000, 'type' => 'HDD','rotation_speed' => 7200],
            ['size' => 1000, 'type' => 'M.2', 'writing_speed' => 5000, 'reading_speed' => 5000],
            ['size' => 512, 'type' => '2.5" SATA', 'writing_speed' => 520, 'reading_speed' => 560],
            ['size' => 1000, 'type' => '2.5" SATA', 'writing_speed' => 530, 'reading_speed' => 550],
            ['size' => 2000, 'type' => 'M.2', 'writing_speed' => 7000, 'reading_speed' => 7400],
        ] as $armazenamento)

        Storage::create($armazenamento);
    }
}
