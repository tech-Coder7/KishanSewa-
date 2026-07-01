<?php

use App\Http\Controllers\Auth\Authcontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\DashController;
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
Route::get('/services', [HomeController::class, 'services']);
Route::get('/home', [HomeController::class, 'home']);
route::get('/registration', [HomeController::class, 'registration'])->name('login');
// route::get('/login',[HomeController::class,'registration'])
route::get('/schame', [HomeController::class, 'schame']);
route::get('/contact', [HomeController::class, 'contact']);
route::get('/crop', [HomeController::class, 'crop']);
// route::get('/login',[Authcontroller::class,'login']);
route::get('/detailes', [HomeController::class, 'detailes']);





// Admin 
Route::middleware(['auth'])->group(function () {


    Route::get('/admin/dashboard', [DashController::class, 'index']);
    Route::get('/admin/categories', [CategoryController::class, 'index']);
    Route::get('/admin/categories/create', [CategoryController::class, 'create']);
    Route::post('/admin/categories/post', [CategoryController::class, 'store'])->name('admin.categories.post');


    Route::get('/admin/crop', [CropController::class, 'index']);
    Route::get('/admin/crop/create', [CropController::class, 'create']);
    Route::post('/admin/crop/post', [CropController::class, 'store'])->name('admin.crop.post');



});

Route::post('/registration', [AuthController::class, 'register'])->name('post.register');
Route::post('/login', [AuthController::class, 'loginPost'])->name('post.login');
Route::get('/logout', [AuthController::class, 'logout']);



// // ============================================
// // VEGETABLE ROUTES
// // ============================================
// Route::prefix('vegetables')->name('vegetable.')->group(function () {
//     // Main page
//     Route::get('/', [VegetableController::class, 'index'])->name('index');

//     // Season-wise vegetables
//     Route::get('/season/{season}', [VegetableController::class, 'season'])->name('season');

//     // Vegetable detail (with id parameter)
//     Route::get('/detail/{id}', [VegetableController::class, 'detail'])->name('detail');
// });

// // ============================================
// // API ROUTES (For AJAX)
// // ============================================
 //Route::prefix('api')->group(function () {
    //Route::post('/vegetable-recommendations', [VegetableController::class, 'aiRecommendations'])
  //      ->name('api.vegetable.recommendations');
// });
