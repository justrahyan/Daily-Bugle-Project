<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Public routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/category/{category}', [HomeController::class, 'category'])->name('category');
Route::get('/region/{region}', [HomeController::class, 'region'])->name('region');
Route::get('/news/{id}', [HomeController::class, 'detail'])->name('news.detail');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes for admin
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/news', [AdminController::class, 'manageNews'])->name('news');
    Route::get('/categories', [AdminController::class, 'manageCategories'])->name('categories');
    
    // User management routes
    Route::resource('users', UserController::class);
    // Route::get('/users', [UserController::class, 'index'])->name('users.index');
    // Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    // Route::post('/users', [UserController::class, 'store'])->name('users.store');
    // Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    // Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    // Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');



    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
});
