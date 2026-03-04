<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [LoginController::class, 'login_send'])->name('login.post');

Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [RegisterController::class, 'register_send'])->name('register.post');

Route::get('/reservar-mesa', function () {
    return view('reservar-mesa');
})->middleware(['auth'])->name('reservar-mesa');
