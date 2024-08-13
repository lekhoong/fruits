<?php

use App\Http\Controllers\VegeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;


Route::get('/', function () {
    return view('welcome');
});

Route::controller(ViewController::class)->group(function () {
    Route::get('/vegetables', 'index');
    Route::get('/register','create');
    Route::get('/login','showLoginForm');
    Route::get('/juice','showJuiceForm');

});

Route::controller(VegeController::class)->group(function () {
    Route::post('/vegetables/store','register')->name('register');

});
