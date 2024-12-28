<?php

use App\Http\Controllers\Lists\Arl\ArlController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('arl')->group(function () {
    Route::get( '/getAll', [ArlController::class, 'getAll'])->name('Arl.GetAll');
});