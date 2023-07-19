<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\ForgetPasswordController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ReportReasonController;
use App\Http\Controllers\Api\ReportUserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamMemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('user')->group(function () {

    Route::post('/register', [AuthenticationController::class, 'register']);
    Route::post('/login', [AuthenticationController::class, 'login']);
    Route::get('/getLoggedIn', [AuthenticationController::class, 'getLoggedIn']);
    Route::post('/verifyPhone', [AuthenticationController::class, 'verifyPhone']);

    Route::post('reset-password', [ProfileController::class, 'resetPassword']);
    Route::post('update-profile', [ProfileController::class, 'updateProfile']);

    Route::post('delete/account', [ProfileController::class, 'deleteAccount']);

    Route::post('checkUser', [AuthenticationController::class, 'checkUsername']);

    Route::post('forget-password', [ForgetPasswordController::class, 'forgetPassword']);

    Route::post('forget-password/checkOtp', [ForgetPasswordController::class, 'checkOtp']);

    Route::post('reset-password', [ForgetPasswordController::class, 'resetPassword']);

    Route::post('change-password', [ProfileController::class, 'changePassword']);

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



Route::prefix('reasons')->group(function () {

    Route::get('/', [ReportReasonController::class, 'getAll']);

});


Route::prefix('report')->group(function () {

    Route::get('/user/all', [ReportUserController::class, 'getAll']);
    Route::post('/user', [ReportUserController::class, 'store']);

});
