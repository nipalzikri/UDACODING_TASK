=<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Autentikasi
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Hanya bisa diakses oleh admin
Route::middleware(['auth.admin'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    
    // Resource controller untuk data staff
    Route::resource('staff', StaffController::class);
});
