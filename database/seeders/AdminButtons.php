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
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'Produtos',
                'route' => '/dashboard/produtos',
                'dropdown' => true,
                "dropdownOptions" => json_encode([
                    ["button_name" => "Adicionar Produtos", "route" => "/dashboard/produto/adicionar"],
                    ["button_name" => "Atualizar Produtos", "route" => "/dashboard/produto/atualizar"],
                    ["button_name" => "Eliminar Produtos", "route" => "/dashboard/produto/eliminar"],
                ]), 
            ],
        ];

        DB::table('AdminButtons')->insert($buttons);
    }
}
