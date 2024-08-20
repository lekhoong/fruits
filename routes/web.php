<?php

use App\Http\Controllers\VegeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;

Route::controller(ViewController::class)->group(function () {
    Route::get('/vegetables', 'index')->name('index');  
    Route::get('/login', 'showLoginForm')->name('login');
    Route::get('/register', 'create')->name('register');
    Route::get('/juice', 'showJuiceForm')->name('juice');
    Route::get('/verify', 'verify')->name('verify');
    Route::get('/profile/{name}', 'profile')->name('profile');

});

Route::controller(VegeController::class)->group(function () {
    Route::post('/vegetables/store','register')->name('vegetables.register'); 
    Route::post('/verify','verifyOtp')->name('otp.verify');
    Route::post('/login', 'login')->name('login_form');
    Route::post('/logout','logoutFunction')->name('logoutFunction');
    Route::post('/profile/update/{name}', 'updateProfile')->name('profile_update');
});



