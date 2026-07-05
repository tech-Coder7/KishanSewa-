<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MandiPrice;

class MandiPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing entries to only show Jharkhand rates
        MandiPrice::truncate();

        $prices = [
            [
                'crop_name' => 'Wheat (Gehun)',
                'price' => 2250,
                'unit' => 'Quintal',
                'trend' => 'up',
                'change_pct' => '+3%',
                'mandi_name' => 'Ranchi Mandi, Jharkhand',
                'status' => true,
            ],
            [
                'crop_name' => 'Rice (Dhan)',
                'price' => 2850,
                'unit' => 'Quintal',
                'trend' => 'down',
                'change_pct' => '-2%',
                'mandi_name' => 'Jamshedpur Mandi, Jharkhand',
                'status' => true,
            ],
            [
                'crop_name' => 'Potato (Aloo)',
                'price' => 1100,
                'unit' => 'Quintal',
                'trend' => 'stable',
                'change_pct' => '0%',
                'mandi_name' => 'Hazaribagh Mandi, Jharkhand',
                'status' => true,
            ],
            [
                'crop_name' => 'Tomato (Tamatar)',
                'price' => 1650,
                'unit' => 'Quintal',
                'trend' => 'up',
                'change_pct' => '+10%',
                'mandi_name' => 'Dhanbad Mandi, Jharkhand',
                'status' => true,
            ],
            [
                'crop_name' => 'Onion (Pyaj)',
                'price' => 2050,
                'unit' => 'Quintal',
                'trend' => 'down',
                'change_pct' => '-5%',
                'mandi_name' => 'Bokaro Mandi, Jharkhand',
                'status' => true,
            ],
            [
                'crop_name' => 'Garlic (Lahsun)',
                'price' => 9200,
                'unit' => 'Quintal',
                'trend' => 'up',
                'change_pct' => '+8%',
                'mandi_name' => 'Deoghar Mandi, Jharkhand',
                'status' => true,
            ],
            [
                'crop_name' => 'Mustard (Sarso)',
                'price' => 5400,
                'unit' => 'Quintal',
                'trend' => 'stable',
                'change_pct' => '0%',
                'mandi_name' => 'Giridih Mandi, Jharkhand',
                'status' => true,
            ],
            [
                'crop_name' => 'Soybean',
                'price' => 4350,
                'unit' => 'Quintal',
                'trend' => 'up',
                'change_pct' => '+1%',
                'mandi_name' => 'Medininagar Mandi, Jharkhand',
                'status' => true,
            ],
        ];

        foreach ($prices as $price) {
            MandiPrice::create($price);
        }
    }
}
