<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Authcontroller extends Controller
{
   public function login(){
      return view('auth.login');
    }
}
