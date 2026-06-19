<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class VegetableController extends BaseController
{
    /**
     * Main page - Shows vegetables with market prices
     */
    public function index()
    {
        $vegetables = $this->getAllVegetables();
        $marketPrices = $this->getMarketPrices();
        
        return view('vegetables.index', [
            'vegetables' => $vegetables,
            'marketPrices' => $marketPrices
        ]);
    }

    /**
     * Season-wise vegetables
     */
    public function season($season)
    {
        $seasonData = $this->getSeasonData($season);
        $vegetables = $this->getVegetablesBySeason($season);
        
        return view('vegetables.season', [
            'season' => $season,
            'seasonData' => $seasonData,
            'vegetables' => $vegetables
        ]);
    }

    /**
     * Vegetable detail page
     */
    public function detail($id)
    {
        $vegetable = $this->getVegetableById($id);
        
        if (!$vegetable) {
            abort(404, 'Vegetable not found');
        }
        
        return view('vegetables.detail', [
            'vegetable' => $vegetable
        ]);
    }

    /**
     * AI Recommendations API
     */
    public function aiRecommendations(Request $request)
    {
        $season = $request->season;
        $soil = $request->soil;
        $water = $request->water;
        
        $recommendations = [];
        $allVeggies = $this->getAllVegetables();
        
        foreach ($allVeggies as $veg) {
            $score = 0;
            
            // Season match (40 points)
            if ($veg['season'] == $season || $veg['season'] == 'year-round') {
                $score += 40;
            }
            
            // Soil match (30 points)
            if (strpos(strtolower($veg['soil_type']), strtolower($soil)) !== false) {
                $score += 30;
            }
            
            // Water match (20 points)
            $waterLevels = ['low' => 1, 'medium' => 2, 'high' => 3];
            $vegWater = $waterLevels[strtolower($veg['water_need'])] ?? 2;
            $userWater = $waterLevels[$water] ?? 2;
            
            if (abs($vegWater - $userWater) <= 1) {
                $score += 20;
            }
            
            if ($score >= 60) {
                $recommendations[] = [
                    'id' => $veg['id'],
                    'name' => $veg['name'],
                    'emoji' => $veg['emoji'],
                    'description' => $veg['short_description'] ?? '',
                    'match' => min($score, 100),
                    'market_price' => $veg['market_price'] ?? 0
                ];
            }
        }
        
        // Sort by match percentage (highest first)
        usort($recommendations, function($a, $b) {
            return $b['match'] - $a['match'];
        });
        
        return response()->json([
            'success' => true,
            'recommendations' => array_slice($recommendations, 0, 5)
        ]);
    }

    // ============================================
    // PRIVATE DATA METHODS
    // ============================================

    private function getSeasonData($season)
    {
        $seasons = [
            'kharif' => [
                'icon' => '🌧️',
                'title' => 'Kharif Season Vegetables',
                'period' => 'June to October (Monsoon)',
                'description' => 'Perfect for vegetables that thrive in warm, humid conditions.',
                'color' => '#2e7d32'
            ],
            'rabi' => [
                'icon' => '❄️',
                'title' => 'Rabi Season Vegetables',
                'period' => 'October to March (Winter)',
                'description' => 'Ideal for vegetables that need cooler temperatures.',
                'color' => '#1565c0'
            ],
            'zaid' => [
                'icon' => '☀️',
                'title' => 'Zaid Season Vegetables',
                'period' => 'March to June (Summer)',
                'description' => 'Vegetables that can tolerate heat and need less water.',
                'color' => '#e65100'
            ],
            'year-round' => [
                'icon' => '🔄',
                'title' => 'Year Round Vegetables',
                'period' => 'Throughout the Year',
                'description' => 'Vegetables that can be grown in any season.',
                'color' => '#6a1b9a'
            ]
        ];
        
        return $seasons[$season] ?? $seasons['kharif'];
    }

    private function getVegetablesBySeason($season)
    {
        $allVegetables = $this->getAllVegetables();
        $filtered = [];
        
        foreach ($allVegetables as $veg) {
            if ($veg['season'] == $season) {
                $filtered[] = $veg;
            }
        }
        
        return $filtered;
    }

    private function getVegetableById($id)
    {
        $allVegetables = $this->getAllVegetables();
        
        foreach ($allVegetables as $veg) {
            if ($veg['id'] == $id) {
                return $veg;
            }
        }
        
        return null;
    }

    // ============================================
    // VEGETABLES DATA
    // ============================================

    private function getAllVegetables()
    {
        return [
            [
                'id' => 1,
                'name' => 'Tomato',
                'emoji' => '🍅',
                'season' => 'kharif',
                'scientific_name' => 'Solanum lycopersicum',
                'duration' => '70-80 days',
                'water_need' => 'Medium',
                'temperature' => '20-25°C',
                'sowing_method' => 'Transplanting',
                'seed_rate' => '300-400 gm/acre',
                'spacing' => '60cm x 45cm',
                'yield' => '25-30 tons/acre',
                'market_price' => 35,
                'profit' => 55000,
                'soil_type' => 'Well-drained loamy soil',
                'soil_ph' => '6.0-7.0',
                'short_description' => 'Popular and profitable vegetable, high demand in market.',
                'harvest_time' => 'December-January',
                'harvest_indicator' => 'Fully colored and firm fruits',
                'storage_life' => '7-10 days at room temperature',
                'gradient' => 'linear-gradient(135deg, #d32f2f, #f44336)',
                'steps' => [
                    ['title' => 'Land Preparation', 'details' => ['Plough deep (20-25 cm)', 'Add 25 tons FYM per acre']],
                    ['title' => 'Seed Treatment', 'details' => ['Treat seeds with Thiram at 3g/kg seed', 'Sow in nursery for 25-30 days']],
                    ['title' => 'Transplanting', 'details' => ['Transplant when plants have 4-5 true leaves', 'Spacing: 60cm between rows, 45cm between plants']],
                    ['title' => 'Irrigation & Fertilizer', 'details' => ['Irrigate every 5-7 days in kharif', 'Apply 25% N at flowering stage']],
                    ['title' => 'Pest Management', 'details' => ['Common pest: Fruit borer (use pheromone traps)', 'Disease: Early blight (spray Mancozeb)']],
                    ['title' => 'Harvesting', 'details' => ['Harvest when fruits are fully colored', 'Pick in morning hours for better shelf life']]
                ],
                'pests' => [
                    ['name' => 'Fruit Borer', 'symptoms' => 'Holes in fruits, larvae inside', 'control' => 'Use pheromone traps, spray NSKE'],
                    ['name' => 'Early Blight', 'symptoms' => 'Dark spots on leaves, defoliation', 'control' => 'Spray Mancozeb or Chlorothalonil']
                ],
                'dos' => ['Always use disease-free certified seeds', 'Practice crop rotation with non-solanaceous crops', 'Stake plants for better fruit quality'],
                'donts' => ['Don\'t overwater, avoid water logging', 'Don\'t use high nitrogen during fruiting', 'Avoid planting near potato or brinjal']
            ],
            [
                'id' => 2,
                'name' => 'Onion',
                'emoji' => '🧅',
                'season' => 'rabi',
                'scientific_name' => 'Allium cepa',
                'duration' => '120-150 days',
                'water_need' => 'Low',
                'temperature' => '15-25°C',
                'sowing_method' => 'Transplanting',
                'seed_rate' => '8-10 kg/acre',
                'spacing' => '15cm x 10cm',
                'yield' => '20-25 tons/acre',
                'market_price' => 25,
                'profit' => 60000,
                'soil_type' => 'Well-drained sandy loam',
                'soil_ph' => '6.0-7.5',
                'short_description' => 'Essential kitchen vegetable, high demand throughout the year.',
                'harvest_time' => 'March-April',
                'harvest_indicator' => 'Leaves yellow and fall over',
                'storage_life' => '3-4 months in proper storage',
                'gradient' => 'linear-gradient(135deg, #e65100, #ff9800)',
                'steps' => [
                    ['title' => 'Field Preparation', 'details' => ['Plough to fine tilth, level properly', 'Add 20 tons FYM per acre']],
                    ['title' => 'Nursery Raising', 'details' => ['Sow seeds in nursery in October', 'Use 3-4 kg seed for 200 sqm nursery']],
                    ['title' => 'Transplanting', 'details' => ['Transplant at 40-45 days stage', 'Spacing: 15cm row to row, 10cm plant to plant']],
                    ['title' => 'Irrigation & Fertilizer', 'details' => ['Give light irrigation every 10-15 days', 'Stop irrigation 15 days before harvest']],
                    ['title' => 'Disease Management', 'details' => ['Common disease: Purple blotch', 'Use resistant varieties']],
                    ['title' => 'Harvesting & Storage', 'details' => ['Harvest when 50-60% plants drop', 'Cure bulbs in field for 3-5 days']]
                ],
                'pests' => [
                    ['name' => 'Thrips', 'symptoms' => 'Silver streaks on leaves, curled tips', 'control' => 'Spray Dimethoate, use neem oil'],
                    ['name' => 'Purple Blotch', 'symptoms' => 'Purple lesions on leaves', 'control' => 'Spray Mancozeb, maintain spacing']
                ],
                'dos' => ['Use disease-free nursery seedlings', 'Practice proper field drainage', 'Stop irrigation 2-3 weeks before harvest'],
                'donts' => ['Don\'t transplant late (risk of bolting)', 'Avoid water logging at any stage', 'Don\'t use fresh manure near bulb region']
            ],
            [
                'id' => 3,
                'name' => 'Potato',
                'emoji' => '🥔',
                'season' => 'rabi',
                'scientific_name' => 'Solanum tuberosum',
                'duration' => '90-110 days',
                'water_need' => 'Medium',
                'temperature' => '15-20°C',
                'sowing_method' => 'Seed tuber planting',
                'seed_rate' => '400-500 kg/acre',
                'spacing' => '45cm x 20cm',
                'yield' => '20-25 tons/acre',
                'market_price' => 20,
                'profit' => 50000,
                'soil_type' => 'Well-drained sandy loam',
                'soil_ph' => '5.5-6.5',
                'short_description' => 'Staple vegetable, high demand throughout India.',
                'harvest_time' => 'February-March',
                'harvest_indicator' => 'Leaves yellow and die back',
                'storage_life' => '2-3 months',
                'gradient' => 'linear-gradient(135deg, #795548, #a1887f)',
                'steps' => [
                    ['title' => 'Land Preparation', 'details' => ['Plough deep', 'Add FYM', 'Make ridges']],
                    ['title' => 'Seed Selection', 'details' => ['Use disease-free seed tubers', 'Cut tubers with 2-3 eyes']],
                    ['title' => 'Planting', 'details' => ['Plant in October-November', 'Spacing: 45cm x 20cm']],
                    ['title' => 'Earthing Up', 'details' => ['Earth up at 30-40 days', 'Second earthing at 60-70 days']],
                    ['title' => 'Irrigation', 'details' => ['Critical stages: tuber initiation and bulking', 'Stop irrigation 2 weeks before harvest']],
                    ['title' => 'Harvesting', 'details' => ['Harvest when leaves yellow', 'Dry tubers for 2-3 days']]
                ],
                'pests' => [
                    ['name' => 'Aphids', 'symptoms' => 'Curled leaves, stunted growth', 'control' => 'Spray neem oil or Imidacloprid'],
                    ['name' => 'Late Blight', 'symptoms' => 'Dark spots on leaves, white growth', 'control' => 'Spray Mancozeb or Metalaxyl']
                ],
                'dos' => ['Use disease-free seed tubers', 'Practice crop rotation with legumes', 'Apply potash fertilizer for better tuber quality'],
                'donts' => ['Avoid water logging', 'Don\'t use infected seed tubers', 'Avoid planting in same field continuously']
            ]
        ];
    }

    // ============================================
    // MARKET PRICES DATA
    // ============================================

    private function getMarketPrices()
    {
        return [
            ['name' => 'Tomato', 'emoji' => '🍅', 'price' => 35, 'unit' => 'kg', 'trend' => 'up', 'change' => '+5%', 'mandi' => 'Azadpur Mandi, Delhi'],
            ['name' => 'Onion', 'emoji' => '🧅', 'price' => 25, 'unit' => 'kg', 'trend' => 'down', 'change' => '-3%', 'mandi' => 'Lasalgaon Mandi, Maharashtra'],
            ['name' => 'Potato', 'emoji' => '🥔', 'price' => 20, 'unit' => 'kg', 'trend' => 'stable', 'change' => '0%', 'mandi' => 'Agra Mandi, UP'],
            ['name' => 'Brinjal', 'emoji' => '🍆', 'price' => 30, 'unit' => 'kg', 'trend' => 'up', 'change' => '+8%', 'mandi' => 'Kolkata Mandi, WB'],
            ['name' => 'Cauliflower', 'emoji' => '🥦', 'price' => 40, 'unit' => 'kg', 'trend' => 'down', 'change' => '-2%', 'mandi' => 'Lucknow Mandi, UP']
        ];
    }
}