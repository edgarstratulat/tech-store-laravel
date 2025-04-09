<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach([
            ['name' => 'Apple'],
            ['name' => 'Samsung'],
            ['name' => 'Xiaomi'],
            ['name' => 'Dell'],
            ['name' => 'Logitech'],
            ['name' => 'Bose'],
            ['name' => 'Intel'],
            ['name' => 'Corsair'],
            ['name' => 'OtterBox'],
            ['name' => 'Anker'],
            ['name' => 'MSI'],
            ['name' => 'ASUS'],
            ['name' => 'Nvidia'],
            ['name' => 'EVGA'],
            ['name' => 'Cooler Master'],
            ['name' => 'NZXT'],
            ['name' => 'Alienware'],
            ['name' => 'Omen by HP'],
            ['name' => 'Razer'],
            ['name' => 'Lenovo'],
            ['name' => 'HP'],
            ['name' => 'Raspberry Pi Foundation'],
            ['name' => 'Beelink'],
            ['name' => 'MiniForum'],
            ['name' => 'Seagate'],
            ['name' => 'AMD'],
            ['name' => 'Sapphire'],
            ['name' => 'Lian Li'],
        ] as $manufacturer)

        Manufacturer::create($manufacturer);
    }
}
