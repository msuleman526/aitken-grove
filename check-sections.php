<?php
// Simple script to check sections
require_once 'vendor/autoload.php';

// Load Laravel
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Page;
use App\Models\Section;

echo "Checking Landing Page Sections:\n";
echo "================================\n\n";

$homePage = Page::where('slug', 'home')->first();

if (!$homePage) {
    echo "❌ No home page found! Need to run seeder.\n";
    echo "Run: php artisan db:seed --class=LandingPageSeeder\n";
} else {
    echo "✅ Home page found: " . $homePage->title . "\n";
    echo "Page ID: " . $homePage->id . "\n\n";
    
    $sections = Section::where('page_id', $homePage->id)
                      ->orderBy('position')
                      ->get();
    
    if ($sections->count() === 0) {
        echo "❌ No sections found! Need to run seeder.\n";
        echo "Run: php artisan db:seed --class=LandingPageSeeder\n";
    } else {
        echo "Sections found (" . $sections->count() . " total):\n";
        echo "-----------------------------------\n";
        
        foreach ($sections as $section) {
            echo sprintf(
                "Position %d: %s (%s) - %s\n",
                $section->position,
                $section->key,
                $section->heading ?? 'No heading',
                $section->is_visible ? 'Visible' : 'Hidden'
            );
        }
        
        // Check specifically for testimonials
        $testimonialsSection = $sections->where('key', 'testimonials')->first();
        if ($testimonialsSection) {
            echo "\n✅ Testimonials section found!\n";
            echo "Position: " . $testimonialsSection->position . "\n";
            echo "Visible: " . ($testimonialsSection->is_visible ? 'Yes' : 'No') . "\n";
            echo "Heading: " . ($testimonialsSection->heading ?? 'None') . "\n";
            
            $content = json_decode($testimonialsSection->content_json, true);
            if ($content && isset($content['items'])) {
                echo "Testimonials count: " . count($content['items']) . "\n";
            }
        } else {
            echo "\n❌ Testimonials section NOT found!\n";
            echo "Need to run: php artisan db:seed --class=LandingPageSeeder\n";
        }
    }
}

echo "\n";
?>