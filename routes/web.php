<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authentication;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;

Route::view('/', 'signin');
Route::view('/signup', 'signup');
Route::post('/', [LoginController::class, 'signin'])->name('signin');
Route::post('/signup', [LoginController::class, 'signup'])->name('signup');

Route::middleware([Authentication::class])->group(function () {
    Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/add/top', [MainController::class, 'addTop'])->name('addTop');
    Route::post('/dashboard/add/pants', [MainController::class, 'addPants'])->name('addPants');
    Route::post('/dashboard/add/shoes', [MainController::class, 'addShoes'])->name('addShoes');
    Route::post('/dashboard/add/jacket', [MainController::class, 'addJacket'])->name('addJacket');
    Route::post('/dashboard/add/accessory', [MainController::class, 'addAccessory'])->name('addAccessory');
});
