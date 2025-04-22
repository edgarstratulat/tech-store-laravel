<?php

namespace Database\Seeders;

use App\Models\Smartphone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SmartphoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach([
            [        
                'model' => 'Iphone 16 Pro Max',
                'ram' => 8,
                'storage' => 128,
                'family_processor' => 'Apple',
                'processor' => 'A18',
                'SIM' => 'Dual SIM',
                'operating_system' => 'iOS',
                'screen_resolution' => '2868x1320',
                'screen_inches' => 6.9,
                'screen_hz' => 120,
                'screen_type' => 'OLED',
                '5G' => true,
                'NFC' => true,
            ],
            [
                'model' => 'Samsung Galaxy S25 Ultra',
                'ram' => 12,
                'storage' => 512,
                'family_processor' => 'Qualcomm',
                'processor' => 'Snapdragon 8 Elite',
                'SIM' => 'Dual SIM',
                'operating_system' => 'Android 15',
                'screen_resolution' => '3088x1440',
                'screen_inches' => 6.9,
                'screen_hz' => 120,
                'screen_type' => 'AMOLED',
                '5G' => true,
                'NFC' => true,
            ],
            [
                'model' => 'Google Pixel 9 Pro',
                'ram' => 16,
                'storage' => 128,
                'family_processor' => 'Google',
                'processor' => 'Tensor G4',
                'SIM' => 'Dual SIM',
                'operating_system' => 'Android 15',
                'screen_resolution' => '1280 x 2856',
                'screen_inches' => 6.8,
                'screen_hz' => 120,
                'screen_type' => 'OLED',
                '5G' => true,
                'NFC' => true,
            ],
        ] as $phone)

        Smartphone::create($phone);
    }
}
