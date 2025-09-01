<?php

// Simple setup script for Services
// Run this in your browser by visiting: /setup-services

try {
    echo "<h1>Setting up Services...</h1>";
    
    // Clear cache first
    echo "<p>Clearing cache...</p>";
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    
    // Run migrations
    echo "<p>Running migrations...</p>";
    Artisan::call('migrate', ['--force' => true]);
    echo "<pre>" . Artisan::output() . "</pre>";
    
    // Refresh migration if needed
    echo "<p>Refreshing migrations to add new columns...</p>";
    Artisan::call('migrate:refresh', ['--seed' => true, '--force' => true]);
    echo "<pre>" . Artisan::output() . "</pre>";
    
    echo "<h2>✅ Setup Complete!</h2>";
    echo "<p><a href='/admin/services'>Go to Admin Panel</a></p>";
    echo "<p><a href='/services'>View Services</a></p>";
    echo "<p><a href='/service/family-health-care'>View Sample Service</a></p>";
    
} catch (Exception $e) {
    echo "<h2>❌ Error:</h2>";
    echo "<pre>" . $e->getMessage() . "</pre>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
}
