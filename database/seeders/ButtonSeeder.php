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
                    ["button_name" => "Gaming", "route" => "/computadores/?computador=gaming"],
                    ["button_name" => "Portáteis", "route" => "/computadores/?computador=laptop"],
                    ["button_name" => "Workstation", "route" => "/computadores/?computador=workstation"],
                    ["button_name" => "Micro-computadores", "route" => "/computadores/?computador=micro-computadores"],
                    ["button_name" => "Desktop", "route" => "/computadores/?computador=desktop"],
                ]), 
            ],
            [
                'button_name' => 'Periféricos',
                'route' => '/perifericos',
                'dropdown' => true,
                "dropdownOptions" => json_encode([
                    ["button_name" => "Perifericos", "route" => "/perifericos"],
                    ["button_name" => "Rato & Teclados", "route" => "/perifericos/?periferico=ratos-e-teclados"],
                    ["button_name" => "Audio PC", "route" => "/perifericos/?periferico=pc-audio"],
                    ["button_name" => "Monitores", "route" => "/perifericos/?periferico=monitores"],
                    ["button_name" => "Webcams", "route" => "/perifericos/?periferico=webcams"],
                ]), 
            ],
            [
                'button_name' => 'Telemóveis',
                'route' => '/telemoveis',
                'dropdown' => true,
                "dropdownOptions" => json_encode([
                    ["button_name" => "Telemóveis", "route" => "/telemoveis"],
                    ["button_name" => "Iphone", "route" => "/telemoveis/?tipo=iphone"],
                    ["button_name" => "Android", "route" => "/telemoveis/?tipo=android"],
                ]), 
            ],
            [
                'button_name' => 'Componentes',
                'route' => '/componentes-para-pc',
                'dropdown' => true,
                "dropdownOptions" => json_encode([
                    ["button_name" => "Componentes para PC", "route" => "/componentes-para-pc"],
                    ["button_name" => "Processadores", "route" => "/componentes-para-pc/?componente=processadores"],
                    ["button_name" => "Memória RAM", "route" => "/componentes-para-pc/?componente=memoria-ram"],
                    ["button_name" => "Armazenamento", "route" => "/componentes-para-pc/?componente=armazenamento"],
                    ["button_name" => "Motherboards", "route" => "/componentes-para-pc/?componente=motherboards"],
                    ["button_name" => "Placas Gráficas", "route" => "/componentes-para-pc/?componente=placas-graficas"],
                    ["button_name" => "Fontes de Alimentação", "route" => "/componentes-para-pc/?componente=fonte-de-alimetacao"],
                    ["button_name" => "CPU Coolers", "route" => "/componentes-para-pc/?componente=cpu-coolers"],
                    ["button_name" => "Caixas para Computadores", "route" => "/componentes-para-pc/?componente=caixas-de-computadores"],
                ]), 
            ],
            [
                'button_name' => 'Acessórios',
                'route' => '/acessorios',
                'dropdown' => true,
                "dropdownOptions" => json_encode([
                    ["button_name" => "Acessórios", "route" => "/acessorios"],
                    ["button_name" => "Para Computador", "route" => "/acessorios/?acessorio=acessorios-para-computador"],
                    ["button_name" => "Para Telemóveis", "route" => "/acessorios/?acessorio=acessorios-para-smartphone"],
                    ["button_name" => "Para Casa", "route" => "/acessorios/?acessorio=acessorios-para-casa"],
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