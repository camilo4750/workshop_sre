<?php

use App\Http\Controllers\Lists\Bank\BankController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('bank')->group(function () {
    Route::get( '/getAll', [BankController::class, 'getAll'])->name('Bank.GetAll');
});