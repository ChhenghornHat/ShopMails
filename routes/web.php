<?php

use App\Http\Controllers\Backend\AdminAuthenticatedController;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\AdminDepositController;
use App\Http\Controllers\Backend\CustomSmtpController;
use App\Http\Controllers\Backend\GmailSmtpController;
use App\Http\Controllers\Backend\MailStockController;
use App\Http\Controllers\Backend\OutlookSmtpController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserRegisterController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PricingController;
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

// Pricing
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

// Dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

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

    // Gmail SMTP
    Route::controller(GmailSmtpController::class)->group(function () {
        Route::get('/mail/smtp/gmail', 'index')->name('mail.smtp.gmail');
        Route::post('/gmail/store', 'store')->name('gmail.store');
        Route::post('/gmail/update/{id}', 'update')->name('gmail.update');
    });

    // Outlook SMTP
    Route::controller(OutlookSmtpController::class)->group(function () {
        Route::get('/mail/smtp/outlook', 'index')->name('mail.smtp.outlook');
        Route::post('/outlook/store', 'store')->name('outlook.store');
        Route::post('/outlook/update/{id}', 'update')->name('outlook.update');
    });

    // Custom SMTP
    Route::controller(CustomSmtpController::class)->group(function () {
        Route::get('/mail/smtp/custom', 'index')->name('mail.smtp.custom');
        Route::post('/custom/store', 'store')->name('custom.store');
        Route::post('/custom/update/{id}', 'update')->name('custom.update');
    });

    // Deposit
    Route::controller(AdminDepositController::class)->group(function () {
        Route::get('/deposits', 'index')->name('deposits');
        Route::get('/deposits/data', 'getDeposits')->name('deposits.data');
        Route::get('/deposits/create', 'create')->name('deposits.create');
        Route::post('/deposits/store', 'store')->name('deposits.store');
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

