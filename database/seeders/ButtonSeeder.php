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
        $buttons = [
            [
                'button_name' => 'Promoções',
                'route' => '/promocoes',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'Computadores',
                'route' => '/computadores',
                'dropdown' => true,
                "dropdownOptions" => json_encode([
                    ["button_name" => "Computadores", "route" => "/computadores"],
                    ["button_name" => "Desktop", "route" => "/computadores/desktop"],
                    ["button_name" => "Gaming", "route" => "/computadores/gaming"],
                    ["button_name" => "Portáteis", "route" => "/computadores/portateis"],
                    ["button_name" => "Workstation", "route" => "/computadores/workstations"],
                    ["button_name" => "Micro-computadores", "route" => "/computadores/micro-computadores"],
                ]), 
            ],
            [
                'button_name' => 'Periféricos',
                'route' => '/perifericos',
                'dropdown' => true,
                "dropdownOptions" => json_encode([
                    ["button_name" => "Perifericos", "route" => "/perifericos"],
                    ["button_name" => "Rato & Teclados", "route" => "/perifericos/ratos-e-teclados"],
                    ["button_name" => "Audio PC", "route" => "/perifericos/pc-audio"],
                    ["button_name" => "Monitores", "route" => "/perifericos/monitores"],
                    ["button_name" => "Webcams", "route" => "/perifericos/webcams"],
                ]), 
            ],
            [
                'button_name' => 'Telemóveis',
                'route' => '/telemoveis',
                'dropdown' => true,
                "dropdownOptions" => json_encode([
                    ["button_name" => "Telemóveis", "route" => "/telemoveis"],
                    ["button_name" => "Iphone", "route" => "/telemoveis/iphone"],
                    ["button_name" => "Android", "route" => "/telemoveis/android"],
                ]), 
            ],
            [
                'button_name' => 'Componentes',
                'route' => '/componentes',
                'dropdown' => true,
                "dropdownOptions" => json_encode([
                    ["button_name" => "Componentes para PC", "route" => "/componentes"],
                    ["button_name" => "Processadores", "route" => "/componentes/processadores"],
                    ["button_name" => "Memória RAM", "route" => "/componentes/memorias-ram"],
                    ["button_name" => "Armazenamento", "route" => "/componentes/armazenamento"],
                    ["button_name" => "Motherboards", "route" => "/componentes/motherboards"],
                    ["button_name" => "Placas Gráficas", "route" => "/componentes/placas-graficas"],
                    ["button_name" => "Fontes de Alimentação", "route" => "/componentes/fontes-de-alimentacao"],
                    ["button_name" => "CPU Coolers", "route" => "/componentes/cpu-coolers"],
                    ["button_name" => "Caixas para Computadores", "route" => "/componentes/caixas-de-computadores"],
                ]), 
            ],
            [
                'button_name' => 'Acessórios',
                'route' => '/acessorios',
                'dropdown' => true,
                "dropdownOptions" => json_encode([
                    ["button_name" => "Acessórios", "route" => "/acessorios"],
                    ["button_name" => "Para Computador", "route" => "/acessorios/acessorios-para-computador"],
                    ["button_name" => "Para Telemóveis", "route" => "/acessorios/acessorios-para-telemovel"],
                    ["button_name" => "Para Casa", "route" => "/acessorios/acessorios-para-casa"],
                ]), 
            ],
            [
                'button_name' => 'Adicionar Produtos',
                'route' => '/produto/adicionar',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'Login',
                'route' => '/login',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'Registo',
                'route' => '/registo',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'Logout',
                'route' => '/logout',
                'dropdown' => false,
                "dropdownOptions" => null
            ]
        ];

        DB::table('Buttons')->insert($buttons);
        
    }
}