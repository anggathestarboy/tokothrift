<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\CheckAuthMiddleware;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Middleware\CheckIsUserRoleMiddleware;
use App\Http\Middleware\CheckIsAdminRoleMiddleware;

Route::get('/', function () {
    return view('home');
});



Route::get('register', [RegisterController::class, 'index'])->name("auth.register");
Route::post('register', [RegisterController::class, 'action'])->name('auth.register.submit');



Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('auth.login')->middleware('guest');
    Route::post('/login', 'action')->name('auth.login.submit');
    Route::post('/logout', 'logout')->name('logout');
});



// Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');




Route::middleware(CheckAuthMiddleware::class)->group(function () {
    Route::middleware(CheckIsAdminRoleMiddleware::class)->group(function () {
        Route::prefix('/admin')->group(function() {
            // Admin Dashboard
            Route::controller(AdminController::class)->group(function () {
                Route::get('/', 'index')->name('admin.admin');
             
            });
            Route::controller(TableController::class)->group(function () {
                Route::get('/users', 'index')->name('admin.users');
             
            });
            Route::controller(CategoryController::class)->group(function () {
                Route::get('/category', 'index')->name('admin.category');
                Route::post('/category', 'store')->name('admin.category.store');
 

             
            });
            
       
        });
    });
});

Route::middleware(CheckAuthMiddleware::class)->group(function () {
    Route::middleware(CheckIsUserRoleMiddleware::class)->group(function () {
        Route::prefix('/user')->group(function() {
            // Admin Dashboard
            Route::controller(UserController::class)->group(function () {
                Route::get('/dashboard', 'index')->name('user.dashboard');
            });
            
       
        });
    });
});