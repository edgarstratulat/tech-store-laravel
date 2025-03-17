<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Edgar Sousa',
                'email' => 'edgar@admin.pt',
                'password' => bcrypt('123'),
            ],
            [
                'name' => 'Alberto Sousa',
                'email' => 'alberto@123.pt',
                'password' => bcrypt('123'),
            ]
        ];

        DB::table('Users')->insert($user);
    }
}
