<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{


  public function index()
  {
    $crop = Crop::where('is_home', 1)->take((6))->get();
    return view('welcome', compact('crop'));
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
