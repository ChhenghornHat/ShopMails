<?php

use App\Http\Controllers\Api\OtpController;
use App\Http\Controllers\Api\PurchaseController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(PurchaseController::class)->group(function () {
        Route::post('/purchase', 'purchase');
        Route::post('/purchase/opt', 'fetchOtp');
    });

    Route::get('/send-test-otp', [OtpController::class, 'sendOtpTest']);
});
