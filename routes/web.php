<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OutfitController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;

Route::view('/', 'signin');
Route::view('/signup', 'signup');
Route::post('/', [SessionController::class, 'signin']);
Route::post('/signup', [RegistrationController::class, 'signup']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [MainController::class, 'index']);
    Route::get('/closet', [MainController::class, 'closet']);
    Route::get('/random', [MainController::class, 'random']);
    Route::post('/dashboard/put-outfit-together', [MainController::class, 'create']);
    Route::post('/dashboard/add/top', [OutfitController::class, 'addTop']);
    Route::post('/dashboard/add/pants', [OutfitController::class, 'addPants']);
    Route::post('/dashboard/add/shoes', [OutfitController::class, 'addShoes']);
    Route::post('/dashboard/add/jacket', [OutfitController::class, 'addJacket']);
    Route::post('/dashboard/add/accessory', [OutfitController::class, 'addAccessory']);
});
