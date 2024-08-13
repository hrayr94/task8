<?php

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;


Route::get('/', [PropertyController::class, 'welcome']);
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');


Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/search', [SearchController::class, 'search'])->name('search.properties');
//    Route::get('/search', [SearchController::class, 'search'])->name('search.properties');

    Route::get('my_profile', [MyProfileController::class, 'index'])->name('my_profile.index');
    Route::put('my_profile', [MyProfileController::class, 'update'])->name('my_profile.update');
    Route::delete('my_profile', [MyProfileController::class, 'destroy'])->name('my_profile.destroy');

    Route::resource('properties', PropertyController::class);
});

require __DIR__ . '/auth.php';
