<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminButtons extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buttons = [
            [
                'button_name' => 'Dashboard',
                'route' => '/dashboard',
                'icon' => 'fa-home',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'Utilizadores',
                'route' => '/dashboard',
                'icon' => 'fa-users',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'Produtos',
                'route' => '/dashboard/produtos',
                'icon'=> 'fa-shopping-cart',
                'dropdown' => true,
                "dropdownOptions" => json_encode([
                    ["button_name" => "Visualizar Produtos", "icon" => "fa-eye", "route" => "/dashboard/produtos"],
                    ["button_name" => "Adicionar Produtos", "icon" => "fa-plus", "route" => "/dashboard/produtos/adicionar"],
                    ["button_name" => "Atualizar Produtos", "icon" => "fa-edit", "route" => "/dashboard/produtos/atualizar"],
                    ["button_name" => "Eliminar Produtos", "icon" => "fa-trash", "route" => "/dashboard/produtos/eliminar"],
                ]), 
            ],
            [
                'button_name' => 'Pedidos',
                'route' => '/dashboard',
                'icon' => 'fa-box',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'Olá',
                'route' => '#',
                'icon' => 'fa-user',
                'dropdown' => true,
                "dropdownOptions" => json_encode([
                    ["button_name" => "Terminar Sessão", "icon" => "fa-sign-out-alt", "route" => "/logout"],
                ]), 
            ],

        ];

        DB::table('AdminButtons')->insert($buttons);
    }
}
