<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// Auth Controllers
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\Auth\CustomerRegisterController;
// Admin Controllers
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderManageController;
// Frontend Controllers
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Customer\CustomerHomeController;

// PUBLIC / CUSTOMER ACCESS(Home)
Route::get('/', [ProductViewController::class, 'index'])->name('home');
// Customer Login/Register
Route::get('login', [CustomerLoginController::class, 'showLoginForm'])->name('customer.login');
Route::post('login', [CustomerLoginController::class, 'login']);
Route::post('logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');
Route::get('register', [CustomerRegisterController::class, 'showRegistrationForm'])->name('customer.register.form');
Route::post('register', [CustomerRegisterController::class, 'register'])->name('customer.register');
// CUSTOMER PROTECTED ROUTES
Route::middleware(['auth:customer'])->group(function () {
    Route::get('/home', [CustomerHomeController::class, 'index'])->name('customer.home');
    Route::get('/profile', [CustomerHomeController::class, 'profile'])->name('customer.profile');
    Route::post('/customer/logout', function (Request $request) {
    Auth::guard('customer')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('customer.login'); // or any page
})->name('customer.logout');
    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
    // Order
    Route::post('/order/place', [OrderController::class, 'place'])->name('order.place');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index'); // Optional: Order history page
});
// ADMIN AUTH ROUTES
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login']);
Route::post('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::get('admin/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('admin.register.form');
Route::post('admin/register', [AdminRegisterController::class, 'register'])->name('admin.register');

// ADMIN PROTECTED ROUTES
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    // Dashboard (optional)
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // create this view if needed
    })->name('admin.dashboard');
    // Category & Product Management
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    // Order Management (optional - create OrderManageController)
    Route::get('/orders', [OrderManageController::class, 'index'])->name('admin.orders.index');
    Route::post('/orders/{order}/status', [OrderManageController::class, 'updateStatus'])->name('admin.orders.status');
});
