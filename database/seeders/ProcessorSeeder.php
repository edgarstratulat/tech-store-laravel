<?php

namespace Database\Seeders;

use App\Models\Processor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach([
            [
                'model' => 'Intel Core i5',
                'cores' => 6, 
                'threads' => 12,
                'tdp' => 65, 
                'socket' => 'LGA 1200'
            ],
            [
                'model' => 'Intel Core i7',
                'cores' => 8, 
                'threads' => 16, 
                'tdp' => 125,
                'socket' => 'LGA 1200'
            ],
            [
                'model' => 'AMD Ryzen 5',
                'cores' => 6, 
                'threads' => 12,
                'tdp' => 65,
                'socket' => 'AM4'
            ],
            [
                'model' => 'AMD Ryzen 7',
                'cores' => 8,
                'threads' => 16,
                'tdp' => 105,
                'socket' => 'AM4'
            ],
            [
                'model' => 'Intel Core i9',
                'cores' => 16,
                'threads' => 24,
                'tdp' => 125,
                'socket' =>
                'LGA 1700'
            ],
            [
                'model' => 'AMD Ryzen 9',
                'cores' => 16,
                'threads' => 32,
                'tdp' => 105,
                'socket' => 'AM4'
            ],
            [
                'model' => 'Intel Core i3',
                'cores' => 4, 
                'threads' => 8,
                'tdp' => 58,
                'socket' => 'LGA 1700'
            ],
            [
                'model' => 'AMD Ryzen 3',
                'cores' => 4,  'threads' => 8,
                'tdp' => 65,
                'socket' => 'AM4'
            ],
            [
                'model' => 'Intel Core i5',
                'cores' => 10,
                'threads' => 16,
                'tdp' => 65,
                'socket' => 'LGA 1700'
            ],
            [
                'model' => 'AMD Ryzen 5',
                'cores' => 6,
                'threads' => 12,
                'tdp' => 105,
                'socket' => 'AM5'
            ],
            [
                'model' => 'Apple M',
                'cores' => 8,
                'threads' => 8,
                'tdp' => 105,
                'socket' => 'ARM'
            ], 
            [
                'model' => 'Intel Core Ultra 9',
                'cores' => 24,
                'threads' => 8,
                'tdp' => 55,
                'socket' => 'LGA 1151'
            ], 
        ] as $cpu)

        Processor::create($cpu);
    }
}
