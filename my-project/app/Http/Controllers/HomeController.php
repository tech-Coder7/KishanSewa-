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
  public function login(){
    return view('login');
  }
}
