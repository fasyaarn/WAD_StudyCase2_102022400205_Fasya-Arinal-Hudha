<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController; 
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('samples', SampleController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');