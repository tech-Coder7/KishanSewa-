<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;

class HomeController extends Controller
{


  public function index()
  {
    return view('welcome');
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

    return view('detailes', compact('data' , 'crop'));
  }
}
