<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashController extends Controller
{
    public function index()
    {
        return view("admin.dashboard");
    }
    public function user()
    {
        $data =User::get();
        return view("admin.user.index", compact('data'));
    }
    
}
