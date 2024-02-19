<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\User\UserController;
Route::prefix('usuarios')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('User.Index');
});
