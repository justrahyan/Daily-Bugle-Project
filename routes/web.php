<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/category/{category}', [HomeController::class, 'category'])->name('category');
Route::get('/region/{region}', [HomeController::class, 'region'])->name('region');
Route::get('/news/{id}', [HomeController::class, 'detail'])->name('news.detail');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/news', [AdminController::class, 'manageNews'])->name('news');
    Route::get('/categories', [AdminController::class, 'manageCategories'])->name('categories');
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('users');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');