<?php

use App\Http\Controllers\Admin\AdminController;
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


    Route::get('users', [UserController::class, 'users'])->name('admin.users');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

});

