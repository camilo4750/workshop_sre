<?php

use App\Http\Controllers\Geographic\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('department')->group(function () {
    Route::get( '/getById/{countryId}', [DepartmentController::class, 'getById'])->name('Department.GetById');
});