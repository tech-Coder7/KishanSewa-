<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Scheme;

class SchemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schemes = [
            [
                'title' => 'PM-KISAN Samman Nidhi',
                'description' => 'Chote aur simant kisaano ko har saal ₹6,000 ki arthik sahayata teen barabar kistoon mein milti hai.',
                'link' => 'https://pmkisan.gov.in/',
                'badge' => 'Active',
                'icon' => 'fas fa-hand-holding-usd',
                'status' => true,
            ],
            [
                'title' => 'Pradhan Mantri Fasal Bima',
                'description' => 'Kharab mausam, baadh, keet ya sookhe se hone wale fasal ke nuksaan ka bima aur bharpai.',
                'link' => 'https://pmfby.gov.in/',
                'badge' => 'Apply Open',
                'icon' => 'fas fa-shield-alt',
                'status' => true,
            ],
            [
                'title' => 'PM-KUSUM (Solar Pump)',
                'description' => 'Kheti ke liye solar pump lagwane par sarkar se 60% tak ki bhari subsidy di jaati hai.',
                'link' => 'https://pmkusum.mnre.gov.in/',
                'badge' => 'Subsidy Available',
                'icon' => 'fas fa-solar-panel',
                'status' => true,
            ],
            [
                'title' => 'E-NAM Portal',
                'description' => 'National Agriculture Market – online mandi platform jisse kisan apni fasal pure desh mein kahin bhi bech sakein.',
                'link' => 'https://www.enam.gov.in/',
                'badge' => 'Active',
                'icon' => 'fas fa-store',
                'status' => true,
            ],
        ];

        foreach ($schemes as $scheme) {
            Scheme::updateOrCreate(['title' => $scheme['title']], $scheme);
        }
    }
}
