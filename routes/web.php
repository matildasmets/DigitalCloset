<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ClothingController;
use App\Http\Controllers\OutfitController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Http\Middleware\Guest;
use App\Http\Middleware\CheckOutfit;

Route::middleware([Guest::class])->group(function () {
    Route::view('/', 'signin');
    Route::view('/signup', 'signup');
    Route::post('/', [SessionController::class, 'store']);
    Route::post('/signup', [RegistrationController::class, 'store']);
});

Route::post('/logout', [SessionController::class, 'destroy']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [MainController::class, 'index']);
    Route::get('/closet', [MainController::class, 'closet']);
    Route::get('/random', [MainController::class, 'random']);
    Route::get('/outfit/{id}', [OutfitController::class, 'show']);

    Route::post('/dashboard/put-outfit-together', [OutfitController::class, 'create']);

    Route::middleware([CheckOutfit::class])->group(function () {
        Route::get('/dashboard/put-outfit-together', [OutfitController::class, 'create']);

        Route::get('/put-outfit-together/top', [OutfitController::class, 'top']);
        Route::get('/put-outfit-together/pants', [OutfitController::class, 'pants']);
        Route::get('/put-outfit-together/shoes', [OutfitController::class, 'shoes']);
        Route::get('/put-outfit-together/jacket', [OutfitController::class, 'jacket']);
        Route::get('/put-outfit-together/accessory', [OutfitController::class, 'accessory']);
        Route::get('/put-outfit-together/preview', [OutfitController::class, 'preview']);

        Route::post('/put-outfit-together/add/top', [OutfitController::class, 'addTop']);
        Route::post('/put-outfit-together/add/pants', [OutfitController::class, 'addPants']);
        Route::post('/put-outfit-together/add/shoes', [OutfitController::class, 'addShoes']);
        Route::post('/put-outfit-together/add/jacket', [OutfitController::class, 'addJacket']);
        Route::post('/put-outfit-together/add/accessory', [OutfitController::class, 'addAccessory']);
        Route::post('/put-outfit-together/save', [OutfitController::class, 'store']);
    });

    Route::post('/dashboard/add/top', [ClothingController::class, 'addTop']);
    Route::post('/dashboard/add/pants', [ClothingController::class, 'addPants']);
    Route::post('/dashboard/add/shoes', [ClothingController::class, 'addShoes']);
    Route::post('/dashboard/add/jacket', [ClothingController::class, 'addJacket']);
    Route::post('/dashboard/add/accessory', [ClothingController::class, 'addAccessory']);
});
