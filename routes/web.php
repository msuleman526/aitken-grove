<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;

Route::get('/', [LandingController::class, 'show']);

// Contact route
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');

// About route
Route::get('/about-us', [AboutController::class, 'show'])->name('about.show');

// Service routes
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/service/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

// Enhanced storage route using dedicated controller
Route::get('/storage/{path}', [StorageController::class, 'serve'])
    ->where('path', '.*')
    ->name('storage.serve');
    
