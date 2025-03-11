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
            ],
            [
                'button_name' => 'Adicionar Produtos',
                'route' => '/produto/adicionar'
            ],
            [
                'button_name' => 'Login',
                'route' => '/login'
            ],
            [
                'button_name' => 'Registo',
                'route' => '/registo'
            ],
            [
                'button_name' => 'Logout',
                'route' => '/logout'
            ]
        ]);
        
    }
}
