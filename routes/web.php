<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VegeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\checkAuth;

Route::controller(ViewController::class)->group(function () {
    Route::get('/vegetables', 'index')->name('index');  
    Route::get('/login', 'showLoginForm')->name('login');
    Route::get('/register', 'create')->name('register');
    Route::get('/juice', 'showJuiceForm')->name('juice');
    Route::get('/verify', 'verify')->name('verify');
    Route::get('/profile/{name}', 'profile')->name('profile');
    Route::get('/cart','viewCart')->middleware(checkAuth::class);

});

Route::controller(VegeController::class)->group(function () {
    Route::post('/vegetables/store','register')->name('vegetables.register'); 
    Route::post('/verify','verifyOtp')->name('otp.verify');
    Route::post('/login', 'login')->name('login_form');
    Route::post('/logout','logoutFunction')->name('logoutFunction');
    Route::post('/profile/update/{name}', 'updateProfile')->name('profile_update');
});

Route::controller(OrderController::class)->group(function(){
    Route::post('/order', 'order')->name('order')->middleware(checkAuth::class);
    Route::post('/finalOrder','finalOrder')->name('finalOrder');
    Route::post('/addToCart/{name}', 'addToCart')->name('addToCart');
   
});

Route::controller(CartController::class)->group(function(){
   Route::delete('/cart/{id}', 'remove')->name('remove')->middleware(checkAuth::class);
   Route::post('/checkout','checkout')->name('checkout');
   Route::get('/track-purchases','trackPurchases')->name('track-purchases');

});

Route::prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/', 'index')->name('admin.dashboard')->middleware(Admin::class);
    Route::put('/update-status/{id}', 'updateStatus')->name('admin.updateStatus');
    Route::get('/products/create','create')->name('admin.products.create')->middleware(Admin::class);
    Route::post('/products','store')->name('admin.products.store');
});

        





