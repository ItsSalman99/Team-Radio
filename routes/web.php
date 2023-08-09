<?php

use App\Http\Controllers\Admin\Auth\AuthenticationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PushNotificationController;
use App\Http\Controllers\Admin\FeedBackController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\LegalController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [AuthenticationController::class, 'login'])->name('login');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('user.logout');

Route::group(['prefix'=>'dashboard', 'middleware' => 'auth.user'], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    //Ajax...
    Route::get('/users/status/{status}', [DashboardController::class, 'getUsers']);
    Route::get('support/users/{id}', [UsersController::class, 'getSupportUsers']);

    Route::get('support/users', [UsersController::class, 'getSupportedUsers'])->name('users.supported');
    Route::post('support/users/store', [UsersController::class, 'storeSupportedUsers'])->name('users.supported.store');
    Route::post('support/users/update/{id}', [UsersController::class, 'updateSupportedUsers']); 
    Route::post('support/users/resetpassword/{id}', [UsersController::class, 'resetSupportedUsers']); 
    
    Route::get('users/block/{id}', [UsersController::class, 'changeStatus'])->name('users.block');
    Route::post('users/block-reason/{id}', [UsersController::class, 'blockWithReason']);

    Route::get('users', [UsersController::class, 'getUsers'])->name('users');
    Route::get('users/filter', [UsersController::class, 'filterUsers'])->name('users.filter');

    Route::get('reports/options', [ReportController::class, 'getReasonsOptions'])->name('reports.options');
    
    Route::post('reports/options/', [ReportController::class, 'store'])->name('reports.options-store');
    
    Route::get('reports/options/{id}', [ReportController::class, 'editOption'])->name('reports.options-edit');
    
    Route::post('reports/options/update/{id}', [ReportController::class, 'update'])->name('reports.options-update');
    
    Route::get('reports/options/block/{id}', [ReportController::class, 'changeStatus'])->name('reports.options-block');
    
    
    Route::get('users/reports', [ReportController::class, 'index'])->name('users.reports');

    Route::get('usernames', [UsersController::class, 'getUsersNames'])->name('usersname');
    
    Route::get('users-name/block/{id}', [UsersController::class, 'changeUserNameStatus'])->name('usersname.block');
    
    Route::post('usernames/store', [UsersController::class, 'addUserName'])->name('usersname.store');
    
    Route::get('export-data', function (){
        
        return view('Admin.DataExport.index');    
    
    })->name('data-export');
    
    Route::get('feedback', [FeedBackController::class, 'index'])->name('feedback');
    Route::get('push-notifications', [PushNotificationController::class, 'index'])->name('push-notifications');
    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('legal', [LegalController::class, 'index'])->name('legal');
    

});

//Ajaxx...
Route::post('/login/store', [AuthenticationController::class, 'store'])->name('login.store');
