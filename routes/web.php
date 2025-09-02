<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\CheckAuthMiddleware;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\InfoPembelianController;
use App\Http\Controllers\User\KeranjangController;
use App\Http\Middleware\CheckIsUserRoleMiddleware;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Http\Middleware\CheckIsAdminRoleMiddleware;
use App\Http\Controllers\User\MetodePembayaranController;
use App\Models\Keranjang;
use App\Http\Controllers\User\PembelianController;


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
                Route::get('/pakaian', 'index')->name('admin.pakaian.index');
                Route::get('/pakaian/search', 'search')->name('admin.pakaian.search');
                Route::post('/pakaian', 'store')->name('admin.pakaian.store');
                Route::get('/pakaian/{id}/edit', 'edit')->name('admin.pakaian.edit'); // kalau mau form edit
Route::put('/pakaian/{id}', 'update')->name('admin.pakaian.update'); // untuk update data
                Route::delete('/pakaian/{id}', 'destroy')->name('admin.pakaian.destroy');
             
            });
        Route::controller(CategoryController::class)->prefix('category')->group(function () {
    Route::get('/', 'index')->name('admin.category');
    Route::post('/', 'store')->name('admin.category.store');
    Route::put('/{id}', 'update')->name('admin.category.update');
    Route::delete('/{id}', 'destroy')->name('admin.category.destroy');


    Route::get('/search', 'search')->name('admin.category.search');
});
        Route::controller(EditController::class)->prefix('profile')->group(function () {
    Route::get('/', 'index')->name('profile.index');
    Route::put('/{id}', 'update')->name('profile.update');



    Route::get('/search', 'search')->name('admin.category.search');
});

 Route::get('/pembelian', [InfoPembelianController::class, 'index'])->name('admin.pembelian');

            
            
       
        });
    });
});

Route::middleware(CheckAuthMiddleware::class)->group(function () {
    Route::middleware(CheckIsUserRoleMiddleware::class)->group(function () {
        Route::prefix('/user')->group(function() {
            // Admin Dashboard
            Route::controller(UserController::class)->group(function () {
                Route::get('/home', 'index')->name('user.dashboard');
                Route::get('/category/{id}', 'byKategori')->name('kategori.show');
                // routes/web.php
Route::get('/search-pakaian',  'search')->name('pakaian.search');


            });



             Route::controller(ProfileController::class)->group(function () {

 Route::get('profile', 'index')->name('user.profile.index');
    Route::put('profile/{id}',  'update')->name('user.profile.update');
});
             Route::controller(MetodePembayaranController::class)->group(function () {
    Route::get('/metode',  'index')->name('metode.index');
    Route::get('/metode/create', 'create')->name('metode.create');
    Route::post('/metode/store', 'store')->name('metode.store');
    Route::get('/metode/{id}/edit', 'edit')->name('metode.edit');
    Route::put('/metode/{id}', 'update')->name('metode.update');
    Route::delete('/metode/{id}',  'destroy')->name('metode.destroy');
Route::get('/metode-user', 'getUserMetode')->name('metode.user');


});
            

Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');



     Route::controller(KeranjangController::class)->group(function () {
Route::get('/keranjang',  'index')->name('keranjang.index');
Route::post('/keranjang/tambah', 'store')->name('user.metode.create');
Route::post('/keranjang/checkout','checkout')->name('keranjang.checkout');
Route::patch('/keranjang/{id}',  'update')->name('keranjang.update');
    Route::delete('/keranjang/{id}', 'destroy')->name('keranjang.destroy');




   



});

 Route::get('/pesanan', [PembelianController::class, 'index'])->name('pesanan');

            
       
        });
    });
});



























    