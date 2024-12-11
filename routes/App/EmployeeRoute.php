<?php

use App\Http\Controllers\Employee\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'session.timeout'])->prefix('employees')->group(function () {

});
