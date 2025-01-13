<?php

use App\Http\Controllers\Lists\PaymentMethod\PaymentMethodController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('paymentMethod')->group(function () {
    Route::get( '/getAll', [PaymentMethodController::class, 'getAll'])->name('PaymentMethod.GetAll');
});