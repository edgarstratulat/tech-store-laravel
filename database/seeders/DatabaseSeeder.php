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
            SpecsSeeder::class,
            ProductSeeder::class
        ]);
    }
}
