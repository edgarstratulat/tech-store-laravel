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
                    ["button_name" => "Adicionar Produtos", "route" => "/produto/adicionar"],
                    ["button_name" => "Atualizar Produtos", "route" => "/produto/atualizar"],
                    ["button_name" => "Eliminar Produtos", "route" => "/produto/eliminar"],
                ]), 
            ],
        ];

        DB::table('AdminButtons')->insert($buttons);
    }
}
