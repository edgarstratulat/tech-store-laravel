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
                'button_name' => 'discount',
                'route' => '/promotions',
                'dropdown' => false,
                'icon' => null,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'computers',
                'route' => '/computers',
                'dropdown' => true,
                'icon' => null,
                "dropdownOptions" => json_encode([
                    ["button_name" => "computers", "icon" => null,  "route" => "/computers"],
                    ["button_name" => "desktop","icon" => null, "route" => "/computers/desktop"],
                    ["button_name" => "laptops","icon" => null, "route" => "/computers/laptops"],
                ]), 
            ],
            [
                'button_name' => 'peripherals',
                'route' => '/perifericos',
                'dropdown' => true,
                'icon' => null,
                "dropdownOptions" => json_encode([
                    ["button_name" => "peripherals","icon" => null, "route" => "/perifericos"],
                    ["button_name" => "mice-keyboard","icon" => null, "route" => "/perifericos/ratos-e-teclados"],
                    ["button_name" => "monitors","icon" => null, "route" => "/perifericos/monitores"],
                    ["button_name" => "audio","icon" => null, "route" => "/perifericos/audio"],
                    ["button_name" => "video","icon" => null, "route" => "/perifericos/video"],
                ]), 
            ],
            [
                'button_name' => 'smartphones',
                'route' => '/smartphones',
                'dropdown' => true,
                'icon' => null,
                "dropdownOptions" => json_encode([
                    ["button_name" => "smartphones","icon" => null, "route" => "/smartphones"],
                    ["button_name" => "iphone","icon" => null, "route" => "/smartphones/iphone"],
                    ["button_name" => "android","icon" => null, "route" => "/smartphones/android"],
                ]), 
            ],
            [
                'button_name' => 'components',
                'route' => '/components',
                'dropdown' => true,
                'icon' => null,
                "dropdownOptions" => json_encode([
                    ["button_name" => "components","icon" => null, "route" => "/components"],
                    ["button_name" => "processors","icon" => null, "route" => "/components/processors"],
                    ["button_name" => "ram-memories","icon" => null, "route" => "/components/ram-memory"],
                    ["button_name" => "storage","icon" => null, "route" => "/components/storage"],
                    ["button_name" => "motherboards","icon" => null, "route" => "/components/motherboards"],
                    ["button_name" => "graphics-cards","icon" => null, "route" => "/components/graphic-cards"],
                    ["button_name" => "power-supplies","icon" => null, "route" => "/components/power-supplies"],
                    ["button_name" => "cpu-coolers","icon" => null, "route" => "/components/cpu-coolers"],
                    ["button_name" => "computers-cases","icon" => null, "route" => "/components/computer-cases"],
                ]), 
            ],
            [
                'button_name' => 'admin-panel',
                'route' => '/dashboard',
                'icon' => 'fa-chart-simple',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'account-settings',
                'route' => '#',
                'icon'=> 'fa-gear',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'view-orders',
                'route' => '#',
                'icon'=> 'fa-box-open',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'login',
                'route' => '/login',
                'icon'=> 'fa-right-to-bracket',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'register',
                'route' => '/registo',
                'icon'=> 'fa-user-plus',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'logout',
                'route' => '/logout',
                'icon'=> 'fa-right-from-bracket',
                'dropdown' => false,
                "dropdownOptions" => null
            ]
        ];

        DB::table('Buttons')->insert($buttons);
        
    }
}