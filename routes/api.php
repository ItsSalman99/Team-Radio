<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('user')->group(function () {

    Route::post('/register', [AuthenticationController::class, 'register']);
    Route::post('/login', [AuthenticationController::class, 'login']);

});


Route::prefix('countries')->group(function () {

    Route::get('/', [CountryController::class, 'getAll']);

});


Route::prefix('teams')->group(function () {

    Route::get('/', [TeamController::class, 'getAll']);

});

Route::prefix('race')->group(function () {

    Route::get('/', [TeamController::class, 'getAll']);

});
