<?php

use App\Http\Controllers\CreationService\CreationServiceController;
use Illuminate\Support\Facades\Route;

Route::prefix('creation-service')->group(function () {
    Route::get('/', [CreationServiceController::class, 'index'])->name('CreationService.index');
});
