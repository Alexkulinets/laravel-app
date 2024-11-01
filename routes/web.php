<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 


Route::get('/', function () {
    return view('content.main');
});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/review', [HomeController::class, 'review'])->name('review');

