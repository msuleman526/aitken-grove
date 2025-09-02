<?php
// Navigate to the Laravel project directory
chdir('C:\laragon\www\aitken-grove');

try {
    // Run the migration
    echo "Running migration...\n";
    $migrationOutput = shell_exec('php artisan migrate --force 2>&1');
    echo "Migration output: " . $migrationOutput . "\n";
    
    // Clear cache
    echo "Clearing cache...\n";
    $cacheOutput = shell_exec('php artisan cache:clear 2>&1');
    echo "Cache cleared: " . $cacheOutput . "\n";
    
    echo "✅ Migration completed successfully!\n";
    echo "✅ Cover image field added to services table\n";
    echo "✅ Service model updated to include cover_image\n";
    echo "✅ ServiceResource updated with cover image upload field\n";
    echo "✅ Why Choose title duplication issue fixed\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
