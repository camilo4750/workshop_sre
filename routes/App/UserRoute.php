<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\User\UserController;
Route::middleware(['auth'])->prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('User.Index');
    Route::get('getUsers', [UserController::class, 'allUsers'])->name('User.AllUsers');
    Route::post('/store', [UserController::class, 'store'])->name('User.Create');
    Route::post('/update/{userId}', [UserController::class, 'update'])->name('User.Update');
});
