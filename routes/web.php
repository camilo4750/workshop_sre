<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if(Auth::guest()) return response()->redirectTo('login');
    else return response()->redirectToRoute('home');
});

Route::get('/home', function () {
    return view('dashboard');
})->name('home')->middleware('auth');

Route::get('/session-expired', function () {
    return view('Error.419');
})->name('session.expired');