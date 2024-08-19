<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('login', [AdminController::class, 'login']);

Route::middleware('admin')->group(function () {
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::resource('properties', App\Http\Controllers\Admin\PropertyController::class, ['as' => 'admin']);
    Route::resource('features', FeatureController::class, ['as' => 'admin']);
    Route::resource('bookings', App\Http\Controllers\Admin\BookingController::class, ['as' => 'admin']);
    Route::resource('leads', App\Http\Controllers\Admin\LeadController::class, ['as' => 'admin']);

    Route::get('blogs', [BlogController::class, 'index'])->name('admin.blogs.index');
    Route::get('blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('blogs', [BlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('blogs/{blog}', [BlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');

    Route::get('users', [UserController::class, 'users'])->name('admin.users');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});
