<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{


  public function index()
  {
    $response = Http::withoutVerifying()->get(
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

    $data = $response->json();

    $weather = $data['current'];
    $forecast = $data['daily'];

    $crop = Crop::where('is_home', 1)
      ->take(6)
      ->get();

    return view('welcome', compact('crop', 'weather', 'forecast'));
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
    return view('schame');
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
}
