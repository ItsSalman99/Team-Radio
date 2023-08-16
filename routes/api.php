<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\ForgetPasswordController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ReportReasonController;
use App\Http\Controllers\Api\ReportUserController;
use App\Http\Controllers\Api\RaceController;
use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\FeedBackController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamMemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('user')->group(function () {

    Route::post('/register', [AuthenticationController::class, 'register']);
    Route::post('/login', [AuthenticationController::class, 'login']);
    Route::post('/getLoggedIn', [AuthenticationController::class, 'getLoggedIn']);

    Route::get('/logout', [AuthenticationController::class, 'logout']);

    Route::post('/verifyPhone', [AuthenticationController::class, 'verifyPhone']);
    Route::post('/verifyOtp', [AuthenticationController::class, 'verifyOtp']);

    Route::post('reset-password', [ProfileController::class, 'resetPassword']);
    Route::post('update-profile', [ProfileController::class, 'updateProfile']);

    Route::post('delete/account', [AuthenticationController::class, 'deleteAccount']);

    Route::post('checkUser', [AuthenticationController::class, 'checkUsername']);
    Route::post('checkUserEmail', [AuthenticationController::class, 'checkEmail']);
    Route::post('checkPhone', [AuthenticationController::class, 'checkPhone']);

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

    Route::get('/', [RaceController::class, 'getAll']);

});

Route::prefix('drivers')->group(function () {

    Route::get('/', [DriverController::class, 'getAll']);

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
    Route::post('/user/update', [ReportUserController::class, 'updateReason']);

});


Route::prefix('feedback')->group(function () {

    Route::get('/user/all', [FeedBackController::class, 'getAll']);
    Route::post('/store', [FeedBackController::class, 'store']);

});

Route::get('/contents/getAll/{type}', [ContentController::class, 'getAll']);