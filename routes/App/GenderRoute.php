<?php

use App\Http\Controllers\Lists\Gender\GenderController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('gender')->group(function () {
    Route::get( '/getAll', [GenderController::class, 'getAll'])->name('Gender.GetAll');
});