<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');

// middleware(['auth']) is used to protect the route so that only authenticated users can access it
Route::middleware(['auth'])->group(function() {
	Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
	Route::get('/create', [DashboardController::class, 'create'])->name('create');
	Route::post('/create', [DashboardController::class, 'create_store'])->name('create.store');
	Route::get('/edit/{id}', [DashboardController::class, 'edit'])->name('edit');
	Route::put('/edit/{id}', [DashboardController::class, 'edit_store'])->name('edit.store');
	Route::delete('/delete/{id}', [DashboardController::class, 'delete'])->name('delete');
});
 