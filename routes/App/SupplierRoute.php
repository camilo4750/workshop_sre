<?php

use App\Http\Controllers\Supplier\SupplierController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'session.timeout'])->prefix('suppliers')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('Supplier.Index');
    Route::get('/getSuppliers', [SupplierController::class, 'getSuppliers'])->name('Supplier.getSuppliers');
    Route::post('/store', [SupplierController::class, 'store'])->name('Supplier.Store');
    Route::post('/update/{supplierId}', [SupplierController::class, 'update'])->name('Supplier.Update');
});
