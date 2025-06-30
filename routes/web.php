<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Auth\CustomerRegisterController;

// Admin registration
Route::get('admin/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('admin.register.form');
Route::post('admin/register', [AdminRegisterController::class, 'register'])->name('admin.register');

// Customer registration
Route::get('register', [CustomerRegisterController::class, 'showRegistrationForm'])->name('customer.register.form');
Route::post('register', [CustomerRegisterController::class, 'register'])->name('customer.register');

// Admin Login Routes
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login']);
Route::post('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Customer Login Routes
Route::get('login', [CustomerLoginController::class, 'showLoginForm'])->name('customer.login');
Route::post('login', [CustomerLoginController::class, 'login']);
Route::post('logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');

// Admin panel
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return "Welcome Admin!";
    })->name('admin.dashboard');
});

// Customer panel
Route::middleware(['auth:customer'])->group(function () {
    Route::get('/home', function () {
        return "Welcome Customer!";
    })->name('customer.home');
});


Route::get('/', function () {
    return view('welcome');
});
