<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\VegetableController;



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









// ============================================<?php<?php<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// ============================================
// VEGETABLE ROUTES
// ============================================
Route::prefix('vegetables')->name('vegetable.')->group(function () {
    // Main page
    Route::get('/', [VegetableController::class, 'index'])->name('index');

    // Season-wise vegetables
    Route::get('/season/{season}', [VegetableController::class, 'season'])->name('season');

    // Vegetable detail (with id parameter)
    Route::get('/detail/{id}', [VegetableController::class, 'detail'])->name('detail');
});

// ============================================
// API ROUTES (For AJAX)
// ============================================
Route::prefix('api')->group(function () {
    Route::post('/vegetable-recommendations', [VegetableController::class, 'aiRecommendations'])
        ->name('api.vegetable.recommendations');
});