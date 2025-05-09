<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\CommonMark\Util\SpecReader;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ButtonSeeder::class,
            AdminSeeder::class,
            PermissionSeeder::class,
            AdminButtons::class,
            ManufacturerSeeder::class,
            CategorySeeder::class,
            SubcategorySeeder::class,
            RamSeeder::class,
            StorageSeeder::class,
            ProcessorSeeder::class,
            MotherboardSeeder::class,
            GPUSeeder::class,
            PowerSupplySeeder::class,
            cpuCoolerSeeder::class,
            ComputerCaseSeeder::class,
            SmartphoneSeeder::class,
            ComputersSeeder::class,
            MouseSeeder::class,
            KeyboardSeeder::class,
            MonitorSeeder::class,
            ProductSeeder::class
        ]);
    }
}
