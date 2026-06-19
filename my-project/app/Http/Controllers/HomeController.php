<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{


  public function index(){
    return  view('welcome');
  }

  public function about_us(){
    return  view('aboutus'); 
  }

  public function plan(){
    return  view('plan');
  }
  public function home(){
    return view('home');
  }
  public function registration(){
    return view('registration');
  }
  public function schame(){
    return view('schame');
  }

  public function contact(){
  return view('contact');
  }

  public function crop(){
  return view('crop');
  }
 
  }
