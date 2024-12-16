<?php

use App\Http\Controllers\Lists\ContractType\ContractTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('contractType')->group(function () {
    Route::get( '/getAll', [ContractTypeController::class, 'getAll'])->name('ContractType.GetAll');
});