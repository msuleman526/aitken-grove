<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StorageController;

Route::get('/', [LandingController::class, 'show']);

// Service routes
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/service/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

// Enhanced storage route using dedicated controller
Route::get('/storage/{path}', [StorageController::class, 'serve'])
    ->where('path', '.*')
    ->name('storage.serve');
    
// Development/Testing routes (remove in production)
Route::get('/storage-test', function() {
    return view('storage-test');
});

Route::get('/debug-storage', function() {
    ob_start();
    include base_path('debug-storage.php');
    return ob_get_clean();
});

Route::get('/setup-services', function() {
    ob_start();
    include base_path('setup-services.php');
    return ob_get_clean();
});

Route::get('/debug-about-service', function() {
    ob_start();
    include base_path('debug-about-service.php');
    return ob_get_clean();
});
