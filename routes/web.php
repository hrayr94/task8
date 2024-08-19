<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ComparingPropertiesController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BlogController;


Route::get('/', [PropertyController::class, 'welcome']);
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/search', [SearchController::class, 'search'])->name('search.properties');
Route::resource('properties', PropertyController::class);

Route::post('/contact', [\App\Http\Controllers\LeadsController::class, 'create'])->name('leads.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');


Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('my_profile', [MyProfileController::class, 'index'])->name('my_profile.index');
    Route::put('my_profile', [MyProfileController::class, 'update'])->name('my_profile.update');
    Route::delete('my_profile', [MyProfileController::class, 'destroy'])->name('my_profile.destroy');
    Route::resource('comparing_properties', ComparingPropertiesController::class);
});

require __DIR__ . '/auth.php';
