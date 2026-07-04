<?php

use App\Http\Controllers\Auth\Authcontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\UserController;
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
Route::get('/services', [HomeController::class, 'services']);
Route::get('/home', [HomeController::class, 'home']);
Route::get('/registration', [Authcontroller::class, 'registration'])->name('login');
Route::get('/schame', [HomeController::class, 'schame']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/crop', [HomeController::class, 'crop']);
Route::get('/details/{slug}', [HomeController::class, 'detailes']);
Route::get('/categories', [HomeController::class, 'categories']);


// Authentication Routes
Route::post('/register', [Authcontroller::class, 'register'])->name('register');
Route::post('/login', [Authcontroller::class, 'loginPost'])->name('login.post');
Route::get('/logout', [Authcontroller::class, 'logout'])->name('logout');





// Admin Routes - Only for role=1 (Admin)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashController::class, 'index']);

    // Categories
    Route::get('/admin/categories', [CategoryController::class, 'index']);
    Route::get('/admin/categories/create', [CategoryController::class, 'create']);
    Route::post('/admin/categories/post', [CategoryController::class, 'store'])->name('admin.categories.post');
    Route::get('/admin/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');

    Route::post('/admin/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::get('/admin/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.delete');

    // Crops
    Route::get('/admin/user', [DashController::class, 'user']);
    Route::get('/admin/crop', [CropController::class, 'index']);
    Route::get('/admin/crop/create', [CropController::class, 'create']);
    Route::post('/admin/crop/post', [CropController::class, 'store'])->name('admin.crop.post');
    Route::get('/admin/crop/edit/{id}', [CropController::class, 'edit'])->name('admin.crop.edit');
    Route::post('/admin/crop/update/{id}', [CropController::class, 'update'])->name('admin.crop.update');
    Route::get('/admin/crop/delete/{id}', [CropController::class, 'destroy'])->name('admin.crop.delete');
    Route::get('/admin/crop/home/{id}', [CropController::class, 'toggleHome'])
    ->name('admin.crop.toggleHome');
});

// User Routes - For regular users (role != 1)
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/user/profile/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/profile/update', [UserController::class, 'update'])->name('user.update');
});




