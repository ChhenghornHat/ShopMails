<?php

use App\Http\Controllers\Backend\AdminAuthenticatedController;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\MailStockController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserRegisterController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__.'/auth.php';

/******* Frontend Route *******/
// Home
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/home', 'index')->name('home');
});

// Dashboard
Route::middleware('user')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
/*Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});*/

/******* Backend Route *******/
// Admin Auth
Route::controller(AdminAuthenticatedController::class)->group(function () {
    Route::get('/admin/login', 'create')->name('admin.login');
    Route::post('/admin/store', 'store')->name('admin.store');
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
});

// Admin Middleware
Route::middleware('admin')->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Mail Stock
    Route::controller(MailStockController::class)->group(function () {
        Route::get('/mail/stock', 'index')->name('mail.stock');
        Route::get('/mail/stock/data', 'getMailStocks')->name('mail.stock.data');
        Route::get('/mail/stock/create', 'create')->name('mail.stock.create');
        Route::post('/mail/stock/store', 'store')->name('mail.stock.store');
        Route::get('/mail/stock/edit/{id}', 'edit')->name('mail.stock.edit');
        Route::post('/mail/stock/update/{id}', 'update')->name('mail.stock.update');
    });

    // User Register
    Route::controller(UserRegisterController::class)->group(function () {
        Route::get('/users/register', 'index')->name('users.register');
        Route::get('/users/register/data', 'getUserRegisters')->name('users.register.data');
    });

    // User Admin
    Route::controller(UserController::class)->group(function () {
        Route::get('/users/admin', 'index')->name('users.admin');
        Route::get('/users/admin/data', 'getUsers')->name('users.admin.data');
    });
});

