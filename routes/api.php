<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamMemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('user')->group(function () {

    Route::post('/register', [AuthenticationController::class, 'register']);
    Route::post('/login', [AuthenticationController::class, 'login']);

    Route::post('reset-password', [ProfileController::class, 'resetPassword']);
    Route::post('update-profile', [ProfileController::class, 'updateProfile']);

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


Route::prefix('team-members')->group(function () {

    Route::get('/', [TeamMemberController::class, 'getAll']);
    Route::post('store', [TeamMemberController::class, 'store']);

});
