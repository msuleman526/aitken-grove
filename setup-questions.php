<?php

// Run this script from the Laravel root directory to set up Questions section

echo "Setting up Questions Section...\n\n";

// Step 1: Run the migration
echo "1. Running migration to add questions_json field...\n";
exec('php artisan migrate', $migrationOutput, $migrationReturn);
if ($migrationReturn === 0) {
    echo "✅ Migration completed successfully\n";
    foreach ($migrationOutput as $line) {
        echo "   $line\n";
    }
} else {
    echo "❌ Migration failed\n";
    foreach ($migrationOutput as $line) {
        echo "   $line\n";
    }
}

echo "\n";

// Step 2: Run the seeder to update services with questions
echo "2. Running seeder to add questions data...\n";
exec('php artisan db:seed --class=ServiceSeeder', $seederOutput, $seederReturn);
if ($seederReturn === 0) {
    echo "✅ Seeder completed successfully\n";
    foreach ($seederOutput as $line) {
        echo "   $line\n";
    }
} else {
    echo "❌ Seeder failed\n";
    foreach ($seederOutput as $line) {
        echo "   $line\n";
    }
}

echo "\n";

// Step 3: Clear cache
echo "3. Clearing application cache...\n";
exec('php artisan cache:clear', $cacheOutput, $cacheReturn);
if ($cacheReturn === 0) {
    echo "✅ Cache cleared successfully\n";
} else {
    echo "❌ Cache clear failed\n";
}

echo "\n";

// Step 4: Test one service
echo "4. Checking if questions data was added...\n";
exec('php artisan tinker --execute="$service = App\Models\Service::where(\'slug\', \'family-health-care\')->first(); echo json_encode($service->questions_json, JSON_PRETTY_PRINT);"', $testOutput, $testReturn);

if ($testReturn === 0 && !empty($testOutput)) {
    echo "✅ Questions data found:\n";
    foreach ($testOutput as $line) {
        echo "   $line\n";
    }
} else {
    echo "❌ No questions data found or error occurred\n";
    foreach ($testOutput as $line) {
        echo "   $line\n";
    }
}

echo "\n=== Setup Complete ===\n";
echo "Visit your service pages to see the Questions section!\n";
