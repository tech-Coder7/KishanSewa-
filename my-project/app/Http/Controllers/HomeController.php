<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Category;
use App\Models\Scheme;
use App\Models\MandiPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{


  public function index()
  {
    // 1. Fetch weather forecast (API 1)
    $weather = [
      'temperature_2m' => 28,
      'relative_humidity_2m' => 65,
      'wind_speed_10m' => 12,
      'weather_code' => 1,
      'is_day' => 1
    ];
    $forecast = [
      'weather_code' => [1, 1, 2, 3, 1],
      'temperature_2m_max' => [32, 33, 31, 30, 32],
      'temperature_2m_min' => [24, 25, 23, 22, 24]
    ];

    try {
      $response = Http::withoutVerifying()->timeout(2.5)->get(
        'https://api.open-meteo.com/v1/forecast',
        [
          'latitude' => 25.609,
          'longitude' => 85.1343,
          'current' => 'temperature_2m,relative_humidity_2m,wind_speed_10m,weather_code,is_day',
          'daily' => 'weather_code,temperature_2m_max,temperature_2m_min',
          'forecast_days' => 5,
          'timezone' => 'auto',
        ]
      );

      if ($response->successful()) {
        $data = $response->json();
        if (!empty($data['current'])) {
          $weather = $data['current'];
        }
        if (!empty($data['daily'])) {
          $forecast = $data['daily'];
        }
      }
    } catch (\Exception $e) {
      // Handled gracefully with fallback values above
    }

    // 2. Fetch Soil forecast parameters (API 2)
    $soilData = [
      'temperature' => 26.8, // Fallback default
      'moisture' => 0.32    // Fallback default
    ];

    try {
      $soilResponse = Http::withoutVerifying()->timeout(2.5)->get(
        'https://api.open-meteo.com/v1/forecast',
        [
          'latitude' => 25.609,
          'longitude' => 85.1343,
          'hourly' => 'soil_temperature_0_to_7cm,soil_moisture_0_to_7cm',
          'forecast_days' => 1,
          'timezone' => 'auto',
        ]
      );

      if ($soilResponse->successful()) {
        $soilJson = $soilResponse->json();
        $soilData['temperature'] = $soilJson['hourly']['soil_temperature_0_to_7cm'][0] ?? 26.8;
        $soilData['moisture'] = $soilJson['hourly']['soil_moisture_0_to_7cm'][0] ?? 0.32;
      }
    } catch (\Exception $e) {
      // Handled gracefully with fallback values above
    }

    // 3. Fetch and parse Krishi Jagran Agriculture News RSS Feed (API 3)
    $news = [];
    try {
      $newsResponse = Http::withoutVerifying()->timeout(3.5)->get('https://krishijagran.com/rss/agriculture-news.xml');
      if ($newsResponse->successful() && !empty($newsResponse->body())) {
        $xml = @simplexml_load_string($newsResponse->body(), 'SimpleXMLElement', LIBXML_NOCDATA);
        if ($xml && isset($xml->channel->item)) {
          $count = 0;
          foreach ($xml->channel->item as $item) {
            if ($count >= 3) break;
            
            $desc = strip_tags((string)$item->description);
            if (strlen($desc) > 130) {
              $desc = mb_substr($desc, 0, 127) . '...';
            }

            $news[] = [
              'title' => (string)$item->title,
              'link' => (string)$item->link,
              'pubDate' => isset($item->pubDate) ? \Carbon\Carbon::parse((string)$item->pubDate)->format('d M Y') : date('d M Y'),
              'description' => $desc,
            ];
            $count++;
          }
        }
      }
    } catch (\Exception $e) {
      // Handled gracefully below
    }

    // Load fallback news if API call was unsuccessful or parsed empty
    if (empty($news)) {
      $news = [
        [
          'title' => 'PM-KISAN 18th Installment Update',
          'link' => 'https://pmkisan.gov.in/',
          'pubDate' => date('d M Y'),
          'description' => 'Agle hafte kisaano ke bank khate mein transfer hogi agli kist. Kisan apna e-KYC turant status check karein.',
        ],
        [
          'title' => 'Monsoon Alert: Heavy rainfall predicted in Central India',
          'link' => 'https://mausam.imd.gov.in/',
          'pubDate' => date('d M Y'),
          'description' => 'Weather department issues heavy rainfall advisory for Madhya Pradesh, Maharashtra and Gujarat. Great for Kharif sowing.',
        ],
        [
          'title' => 'Subsidy on Solar Pumps under KUSUM scheme extended',
          'link' => 'https://pmkusum.mnre.gov.in/',
          'pubDate' => date('d M Y'),
          'description' => 'Sarkar ne solar water pump subsidy registration ki aakhri tareekh badhayi. Farmers ko milegi 60% tak subsidy.',
        ]
      ];
    }

    $crop = Crop::where('is_home', 1)
      ->take(6)
      ->get();

    $mandiPrices = MandiPrice::where('status', 1)->get();
    $schemes = Scheme::where('status', 1)->take(3)->get();

    return view('welcome', compact('crop', 'weather', 'forecast', 'mandiPrices', 'schemes', 'soilData', 'news'));
  }

  public function about_us()
  {
    return view('aboutus');
  }

  public function services()
  {
    return view('services');
  }
  public function home()
  {
    return view('home');
  }
  public function registration()
  {
    return view('registration');
  }
  public function schame()
  {
    $schemes = Scheme::where('status', 1)->get();
    return view('schame', compact('schemes'));
  }

  public function contact()
  {
    return view('contact');
  }
  public function categories(Request $request)
  {
    $q = $request->query('q');
    $name = $request->query('name');
    $data = Category::where(['status' => 1, 'parent_id' => $q])->get();

    $crop = Crop::where('status', 1)->whereIn('categories_id', $data->pluck('id'))
      ->get();

    return view('categories', compact('data', 'name', 'crop'));

  }

  public function crop()
  {
    $crop = Crop::with('category')->where('status', 1)->get();
    //  dump($crop);
    return view('crop', compact('crop'));
  }
  public function detailes($slug)
  {

    $data = Crop::where('slug', $slug)->first();
    $crop = Crop::where('categories_id', $data->categories_id)->get();

    return view('detailes', compact('data', 'crop'));
  }

  public function syncMandiPrices()
  {
    try {
      \Illuminate\Support\Facades\Artisan::call('mandi:sync');
      
      $mandiPrices = \App\Models\MandiPrice::where('status', 1)->get();
      
      return response()->json([
        'success' => true,
        'message' => 'Mandi prices updated successfully.',
        'data' => $mandiPrices
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Error updating prices: ' . $e->getMessage()
      ], 500);
    }
  }

  public function mandiPrices()
  {
    $mandiPrices = MandiPrice::where('status', 1)->get();
    
    // Calculate stats dynamically
    $highestPrice = MandiPrice::where('status', 1)->max('price') ?? 0;
    $highestCrop = MandiPrice::where('status', 1)->orderBy('price', 'desc')->first()->crop_name ?? 'N/A';
    $activeMandis = MandiPrice::where('status', 1)->distinct('mandi_name')->count('mandi_name') ?? 0;

    return view('mandi_prices', compact('mandiPrices', 'highestPrice', 'highestCrop', 'activeMandis'));
  }
}
