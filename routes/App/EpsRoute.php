<?php

use App\Http\Controllers\Lists\Eps\EpsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('eps')->group(function () {
    Route::get( '/getAll', [EpsController::class, 'getAll'])->name('Eps.GetAll');
});