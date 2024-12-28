<?php

use App\Http\Controllers\Lists\TypeDocument\TypeDocumentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('typeDocument')->group(function () {
    Route::get( '/getAll', [TypeDocumentController::class, 'getAll'])->name('TypeDocument.GetAll');
});