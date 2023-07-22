<?php

use App\Http\Controllers\Admin\Auth\AuthenticationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthenticationController::class, 'login'])->name('login');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('user.logout');

Route::group(['prefix'=>'dashboard'], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('support/users', [UsersController::class, 'getSupportedUsers'])->name('users.supported');
    Route::post('support/users/store', [UsersController::class, 'storeSupportedUsers'])->name('users.supported.store');

    Route::get('users', [UsersController::class, 'getUsers'])->name('users');

    Route::get('reports/options', [ReportController::class, 'getReasonsOptions'])->name('reports.options');
    Route::get('users/reports', [ReportController::class, 'index'])->name('users.reports');

    Route::get('usernames', [UsersController::class, 'getUsersNames'])->name('usersname');

});

//Ajaxx...
Route::post('/login/store', [AuthenticationController::class, 'store'])->name('login.store');
