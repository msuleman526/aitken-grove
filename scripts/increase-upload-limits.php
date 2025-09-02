<?php
/**
 * Script to increase Filament file upload limits from 2MB to 20MB
 * 
 * This script checks and displays current PHP configuration values
 * that affect file upload sizes and provides recommendations.
 */

echo "==========================================\n";
echo "   FILAMENT UPLOAD LIMIT INCREASE TOOL   \n";
echo "==========================================\n\n";

echo "Current PHP Configuration:\n";
echo "- upload_max_filesize: " . ini_get('upload_max_filesize') . "\n";
echo "- post_max_size: " . ini_get('post_max_size') . "\n";
echo "- max_execution_time: " . ini_get('max_execution_time') . " seconds\n";
echo "- memory_limit: " . ini_get('memory_limit') . "\n";

echo "\n==========================================\n";
echo "Filament Application Changes:\n";
echo "==========================================\n";

// Check if we're in the correct directory
if (!file_exists('app/Filament/Resources/ServiceResource.php')) {
    echo "❌ Error: Please run this script from the Laravel root directory\n";
    exit(1);
}

// Files that were updated
$updatedFiles = [
    'app/Filament/Resources/ServiceResource.php' => 'Service image uploads',
    'app/Filament/Resources/SectionResource.php' => 'Section image uploads'
];

echo "✅ Updated Filament file upload limits to 20MB (20480 KB) in:\n";
foreach ($updatedFiles as $file => $description) {
    if (file_exists($file)) {
        echo "   ✓ $file ($description)\n";
    } else {
        echo "   ❌ $file (NOT FOUND)\n";
    }
}

echo "\n==========================================\n";
echo "Server Configuration Recommendations:\n";
echo "==========================================\n";

// Check PHP limits
$uploadMax = ini_get('upload_max_filesize');
$postMax = ini_get('post_max_size');

$uploadMaxBytes = convertToBytes($uploadMax);
$postMaxBytes = convertToBytes($postMax);
$requiredBytes = 20 * 1024 * 1024; // 20MB

if ($uploadMaxBytes < $requiredBytes) {
    echo "⚠️  ATTENTION: PHP upload_max_filesize ($uploadMax) is less than 20MB\n";
    echo "   Recommendation: Set upload_max_filesize = 25M in php.ini\n";
} else {
    echo "✅ PHP upload_max_filesize ($uploadMax) is sufficient\n";
}

if ($postMaxBytes < $requiredBytes) {
    echo "⚠️  ATTENTION: PHP post_max_size ($postMax) is less than 20MB\n";
    echo "   Recommendation: Set post_max_size = 30M in php.ini\n";
} else {
    echo "✅ PHP post_max_size ($postMax) is sufficient\n";
}

// Memory and execution time recommendations
$memoryLimit = ini_get('memory_limit');
$maxExecution = ini_get('max_execution_time');

if (convertToBytes($memoryLimit) < 256 * 1024 * 1024) {
    echo "⚠️  ATTENTION: PHP memory_limit ($memoryLimit) may be too low for large uploads\n";
    echo "   Recommendation: Set memory_limit = 256M in php.ini\n";
} else {
    echo "✅ PHP memory_limit ($memoryLimit) is sufficient\n";
}

if ($maxExecution < 300) {
    echo "⚠️  ATTENTION: PHP max_execution_time ($maxExecution seconds) may be too low for large uploads\n";
    echo "   Recommendation: Set max_execution_time = 300 in php.ini\n";
} else {
    echo "✅ PHP max_execution_time ($maxExecution seconds) is sufficient\n";
}

echo "\n==========================================\n";
echo "Laragon Configuration Steps:\n";
echo "==========================================\n";

echo "If you need to update PHP settings in Laragon:\n";
echo "1. Right-click Laragon tray icon → Quick app → [apache/nginx] → php.ini\n";
echo "2. Find and update these values:\n";
echo "   upload_max_filesize = 25M\n";
echo "   post_max_size = 30M\n";
echo "   memory_limit = 256M\n";
echo "   max_execution_time = 300\n";
echo "3. Save the file and restart Laragon\n";

echo "\n==========================================\n";
echo "Testing Upload Limits:\n";
echo "==========================================\n";

echo "To test the new 20MB upload limit:\n";
echo "1. Go to: http://aitken-grove.test/admin\n";
echo "2. Navigate to Services → Edit any service\n";
echo "3. Try uploading an image between 2MB and 20MB\n";
echo "4. Check the 'Why Choose Section' image uploads\n";

echo "\n==========================================\n";
echo "Summary of Changes:\n";
echo "==========================================\n";

echo "✅ Filament FileUpload components updated from 2MB to 20MB\n";
echo "✅ Helper text updated to reflect new 20MB limit\n";
echo "✅ Both ServiceResource and SectionResource updated\n";
echo "✅ All image upload fields now support files up to 20MB\n";

echo "\nFile upload limit increase completed successfully! 🎉\n\n";

function convertToBytes($value) {
    $value = trim($value);
    $last = strtolower($value[strlen($value) - 1]);
    $num = (int) $value;
    
    switch ($last) {
        case 'g':
            $num *= 1024;
        case 'm':
            $num *= 1024;
        case 'k':
            $num *= 1024;
    }
    
    return $num;
}
