<?php

use App\Http\Controllers\EmployeeManagement\Payment\PaymentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'session.timeout'])->prefix('employeePayment')->group(function () {
    Route::get('/', [PaymentController::class, 'index'])->name('EmployeePayment.Index');
});
