<?php

use App\Http\Controllers\Band\BandController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Auth::routes();

Route::get('/', HomeController::class)->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',DashboardController::class)->name('dashboard');

    Route::prefix('bands')->group(function(){
        Route::get('create',[BandController::class,'create'])->name('bands.create');
        Route::post('create',[BandController::class,'store']);
    });
});

