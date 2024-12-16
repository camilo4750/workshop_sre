<?php

use App\Http\Controllers\Lists\EmployeeStatus\EmployeeStatusController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('employeeStatus')->group(function () {
    Route::get( '/getAll', [EmployeeStatusController::class, 'getAll'])->name('EmployeeStatus.GetAll');
});