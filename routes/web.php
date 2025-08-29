<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\StorageController;

Route::get('/', [LandingController::class, 'show']);

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
