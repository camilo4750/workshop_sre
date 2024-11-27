<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\User\UserController;
Route::prefix('usuarios')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('User.Index');
    Route::get('getUsers', [UserController::class, 'allUsers'])->name('User.AllUsers');
    Route::post('/createUser', [UserController::class, 'store'])->name('User.Create');
    Route::post('/updateUser', [UserController::class, 'update'])->name('User.Update');
});
