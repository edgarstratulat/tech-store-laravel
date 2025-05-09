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
                'button_name' => 'dashboard',
                'route' => '/dashboard',
                'icon' => 'fa-home',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'users',
                'route' => '/dashboard',
                'icon' => 'fa-users',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'products',
                'route' => '/dashboard/productss',
                'icon'=> 'fa-shopping-cart',
                'dropdown' => true,
                "dropdownOptions" => json_encode([
                    ["button_name" => "view-products", "icon" => "fa-eye", "route" => "/dashboard/products"],
                ]), 
            ],
            [
                'button_name' => 'orders',
                'route' => '/dashboard',
                'icon' => 'fa-box',
                'dropdown' => false,
                "dropdownOptions" => null
            ],
            [
                'button_name' => 'hi-admin',
                'route' => '#',
                'icon' => 'fa-user',
                'dropdown' => true,
                "dropdownOptions" => json_encode([
                    ["button_name" => "logout", "icon" => "fa-sign-out-alt", "route" => "/logout"],
                ]), 
            ],

        ];

        DB::table('AdminButtons')->insert($buttons);
    }
}
