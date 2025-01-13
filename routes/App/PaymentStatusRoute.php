<?php

use App\Http\Controllers\Lists\PaymentStatus\PaymentStatusController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('paymentStatus')->group(function () {
    Route::get( '/getAll', [PaymentStatusController::class, 'getAll'])->name('PaymentStatus.GetAll');
});