<?php

use App\Http\Controllers\Employee\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'session.timeout'])->prefix('employee')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('Employee.Index');
    Route::get('/getAll', [EmployeeController::class, 'getEmployees'])->name('Employee.GetAll');
    Route::get('/getById/{employeeId}', [EmployeeController::class, 'getById'])->name('Employee.getById');
});
