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
                'icon' => null,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'Computadores',
                'route' => '/computadores',
                'dropdown' => true,
                'icon' => null,
                "dropdownOptions" => json_encode([
                    ["button_name" => "Computadores", "icon" => null,  "route" => "/computadores"],
                    ["button_name" => "Desktop","icon" => null, "route" => "/computadores/desktop"],
                    ["button_name" => "Gaming","icon" => null, "route" => "/computadores/gaming"],
                    ["button_name" => "Portáteis","icon" => null, "route" => "/computadores/portateis"],
                    ["button_name" => "Workstation","icon" => null, "route" => "/computadores/workstations"],
                    ["button_name" => "Micro-computadores","icon" => null, "route" => "/computadores/micro-computadores"],
                ]), 
            ],
            [
                'button_name' => 'Periféricos',
                'route' => '/perifericos',
                'dropdown' => true,
                'icon' => null,
                "dropdownOptions" => json_encode([
                    ["button_name" => "Perifericos","icon" => null, "route" => "/perifericos"],
                    ["button_name" => "Rato & Teclados","icon" => null, "route" => "/perifericos/ratos-e-teclados"],
                    ["button_name" => "Audio PC","icon" => null, "route" => "/perifericos/pc-audio"],
                    ["button_name" => "Monitores","icon" => null, "route" => "/perifericos/monitores"],
                    ["button_name" => "Webcams","icon" => null, "route" => "/perifericos/webcams"],
                ]), 
            ],
            [
                'button_name' => 'Telemóveis',
                'route' => '/telemoveis',
                'dropdown' => true,
                'icon' => null,
                "dropdownOptions" => json_encode([
                    ["button_name" => "Telemóveis","icon" => null, "route" => "/telemoveis"],
                    ["button_name" => "Iphone","icon" => null, "route" => "/telemoveis/iphone"],
                    ["button_name" => "Android","icon" => null, "route" => "/telemoveis/android"],
                ]), 
            ],
            [
                'button_name' => 'Componentes',
                'route' => '/componentes',
                'dropdown' => true,
                'icon' => null,
                "dropdownOptions" => json_encode([
                    ["button_name" => "Componentes para PC","icon" => null, "route" => "/componentes"],
                    ["button_name" => "Processadores","icon" => null, "route" => "/componentes/processadores"],
                    ["button_name" => "Memória RAM","icon" => null, "route" => "/componentes/memorias-ram"],
                    ["button_name" => "Armazenamento","icon" => null, "route" => "/componentes/armazenamento"],
                    ["button_name" => "Motherboards","icon" => null, "route" => "/componentes/motherboards"],
                    ["button_name" => "Placas Gráficas","icon" => null, "route" => "/componentes/placas-graficas"],
                    ["button_name" => "Fontes de Alimentação","icon" => null, "route" => "/componentes/fontes-de-alimentacao"],
                    ["button_name" => "CPU Coolers","icon" => null, "route" => "/componentes/cpu-coolers"],
                    ["button_name" => "Caixas para Computadores","icon" => null, "route" => "/componentes/caixas-de-computadores"],
                ]), 
            ],
            [
                'button_name' => 'Acessórios',
                'route' => '/acessorios',
                'dropdown' => true,
                'icon' => null,
                "dropdownOptions" => json_encode([
                    ["button_name" => "Acessórios","icon" => null,  "route" => "/acessorios"],
                    ["button_name" => "Para Computador","icon" => null, "route" => "/acessorios/acessorios-para-computador"],
                    ["button_name" => "Para Telemóveis","icon" => null, "route" => "/acessorios/acessorios-para-telemovel"],
                    ["button_name" => "Para Casa","icon" => null, "route" => "/acessorios/acessorios-para-casa"],
                ]), 
            ],
            [
                'button_name' => 'Painel Administrativo',
                'route' => '/dashboard',
                'icon' => 'fa-chart-simple',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'Definições da Conta',
                'route' => '#',
                'icon'=> 'fa-gear',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'Ver Pedidos',
                'route' => '#',
                'icon'=> 'fa-box-open',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'Iniciar Sessão',
                'route' => '/login',
                'icon'=> 'fa-right-to-bracket',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'Criar Conta',
                'route' => '/registo',
                'icon'=> 'fa-user-plus',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'Terminar Sessão',
                'route' => '/logout',
                'icon'=> 'fa-right-from-bracket',
                'dropdown' => false,
                "dropdownOptions" => null
            ]
        ];

        DB::table('Buttons')->insert($buttons);
        
    }
}