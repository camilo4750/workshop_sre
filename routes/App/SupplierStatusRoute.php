<?php

use App\Http\Controllers\Supplier\SupplierStatusController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('supplierStatus')->group(function () {
    Route::get( '/getAll', [SupplierStatusController::class, 'getAll'])->name('SupplierStatus.GetAll');
});