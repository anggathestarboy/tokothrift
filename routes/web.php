<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\CheckAuthMiddleware;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('home');
});



Route::get('register', [RegisterController::class, 'index'])->name("auth.register");
Route::post('register', [RegisterController::class, 'action'])->name('auth.register.submit');



Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('auth.login')->middleware('guest');
    Route::post('/login', 'action')->name('auth.login.submit');
});



// Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');





Route::middleware(CheckAuthMiddleware::class)->group(function () {
    Route::prefix('/admin')->group(function() {
        // Admin Dashboard
        Route::controller(AdminController::class)->group(function () {
            Route::get('/', 'index')->name('admin.admin');
        });
        

    });
});