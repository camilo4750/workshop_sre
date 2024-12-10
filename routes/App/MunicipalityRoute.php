<?php

use App\Http\Controllers\Geographic\MunicipalityController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('municipality')->group(function () {
    Route::get( '/getById/{departmentId}', [MunicipalityController::class, 'getById'])->name('Municipality.GetById');
});