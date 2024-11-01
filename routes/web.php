<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'getSignin'])->name('signin');
Route::get('/signup', [MainController::class, 'getSignup'])->name('signup');
