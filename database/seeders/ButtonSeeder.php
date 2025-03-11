<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ButtonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Buttons')->insert([
            [
                'button_name' => 'Promoções',
                'route' => '/promocoes'
            ],
            [
                'button_name' => 'Computadores',
                'route' => '/computadores'
            ],
            [
                'button_name' => 'Periféricos',
                'route' => '/perifericos'
            ],
            [
                'button_name' => 'Telemóveis',
                'route' => '/telemoveis'
            ],
            [
                'button_name' => 'Componentes',
                'route' => '/componentes-para-pc'
            ],
            [
                'button_name' => 'Acessórios',
                'route' => '/acessorios'
            ]
        ]);
        
    }
}
