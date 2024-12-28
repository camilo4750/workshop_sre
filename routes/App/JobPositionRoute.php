<?php

use App\Http\Controllers\Lists\JobPosition\JobPositionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('jobPosition')->group(function () {
    Route::get( '/getAll', [JobPositionController::class, 'getAll'])->name('JobPosition.GetAll');
});