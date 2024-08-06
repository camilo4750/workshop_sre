<?php

use App\Http\Controllers\Supplier\SupplierController;
use Illuminate\Support\Facades\Route;

Route::prefix('suppliers')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('Supplier.Index');
    Route::get('/getAllSuppliers', [SupplierController::class, 'allSuppliers'])->name('Supplier.AllSuppliers');
    Route::post('/store', [SupplierController::class, 'store'])->name('Supplier.Store');
    Route::patch('/toggleStatus', [SupplierController::class, 'toggleStatus'])->name('Supplier.ToggleStatus');
    Route::put('/update', [SupplierController::class, 'update'])->name('Supplier.Update');
});
