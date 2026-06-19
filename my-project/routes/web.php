<?php

use App\Http\Controllers\Auth\Authcontroller;
use App\Http\Controllers\DashController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', function () {
//     return view('welcome');
// });
// Route::get('/about-us', function () {
//     return view('aboutus');
// });




Route::get('/', [HomeController::class, 'index']);
Route::get('/about-us', [HomeController::class, 'about_us']);
Route::get('/plans', [HomeController::class, 'plan']);
Route::get('/home', [HomeController::class, 'home']);
route::get('/registration',[HomeController::class,'registration']);
route::get('/schame',[HomeController::class,'schame']);
route::get('/contact',[HomeController::class,'contact']);
route::get('/crop',[HomeController::class,'crop']);
route::get('/login',[Authcontroller::class,'login']);




// Admin 

Route::get('/admin/dashboard',[DashController::class,'index']);