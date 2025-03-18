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
                    ["button_name" => "Adicionar Produtos", "icon" => "fa-plus", "route" => "/dashboard/produto/adicionar"],
                    ["button_name" => "Atualizar Produtos", "icon" => "fa-edit", "route" => "/dashboard/produto/atualizar"],
                    ["button_name" => "Eliminar Produtos", "icon" => "fa-trash", "route" => "/dashboard/produto/eliminar"],
                ]), 
            ],
            [
                'button_name' => 'Pedidos',
                'route' => '/dashboard',
                'icon' => 'fa-box',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
        ];

        DB::table('AdminButtons')->insert($buttons);
    }
}
