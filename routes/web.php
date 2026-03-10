<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('welcome');
});

// RUTAS SIN SESION
Route::get('/login', [LoginController::class, 'getLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login_send'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'getRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register_send'])->name('register.post');

Route::middleware(['auth'])->group(function () {
    // RUTAS ADMIN

    Route::get('/admin', [AdminController::class, 'getAdminPanel'])->name('admin-panel');

    Route::get('/admin/add-table', [AdminController::class, 'getAddTableView'])->name('add-table');
    Route::post('/admin/add-table', [AdminController::class, 'setAddTable'])->name('add-table.post');

    // RUTAS CON SESION CLIENTE
    Route::get('/reservar-mesa', [ClientController::class, 'reservarMesa'])->name('reservar-mesa');

});
