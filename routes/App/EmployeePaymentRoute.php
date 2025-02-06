<?php

use App\Http\Controllers\EmployeeManagement\Payment\PaymentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'session.timeout'])->prefix('employeePayment')->group(function () {
    Route::get('/', [PaymentController::class, 'index'])->name('EmployeePayment.Index');
    Route::get('/getAll', [PaymentController::class, 'getAll'])->name('EmployeePayment.GetAll');
    Route::get('/getById/{paymentId}', [PaymentController::class, 'getById'])->name('EmployeePayment.GetById');
    Route::post('/store', [PaymentController::class, 'store'])->name('EmployeePayment.Store');
    Route::post('/update/{paymentId}', [PaymentController::class, 'update'])->name('EmployeePayment.Update');
});
