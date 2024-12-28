<?php

use App\Http\Controllers\Lists\PensionFund\PensionFundController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('pensionFund')->group(function () {
    Route::get( '/getAll', [PensionFundController::class, 'getAll'])->name('PensionFund.GetAll');
});