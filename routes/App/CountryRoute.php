<?php

use App\Http\Controllers\Geographic\CountryController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('country')->group(function () {
    Route::get( '/getAll', [CountryController::class, 'getAll'])->name('Country.GetAll');
});