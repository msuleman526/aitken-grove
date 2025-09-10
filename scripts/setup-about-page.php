<?php

// Script to set up the About Us page
require_once '../vendor/autoload.php';

$app = require_once '../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Page;
use App\Models\Section;

try {
    echo "Setting up About Us page...\n";
    
    // Check if about-us page already exists
    $page = Page::where('slug', 'about-us')->first();
    
    if (!$page) {
        // Create the about-us page
        $page = Page::create([
            'slug' => 'about-us',
            'title' => 'About Us - Aitken Grove Medical & Aesthetic Center',
            'subtitle' => 'Learn about our commitment to your health',
            'hero_title' => 'About Us',
            'hero_description' => 'Your Health, Our Promise for a Better Tomorrow',
            'meta_title' => 'About Us - Aitken Grove Medical & Aesthetic Center',
            'meta_description' => 'Learn about Aitken Grove Medical & Aesthetic Center. Dedicated to caring for you and your family with compassion, trust, and medical excellence.',
            'canonical_url' => url('/about-us'),
            'meta_robots' => 'index, follow',
            'published_at' => now()
        ]);
        echo "✅ Created About Us page with ID: {$page->id}\n";
    } else {
        echo "ℹ️ About Us page already exists with ID: {$page->id}\n";
    }
    
    // Check if about_hero section exists
    $aboutHeroSection = Section::where('page_id', $page->id)
        ->where('key', 'about_hero')
        ->first();
        
    if (!$aboutHeroSection) {
        $aboutHeroSection = Section::create([
            'page_id' => $page->id,
            'key' => 'about_hero',
            'heading' => 'Your Health, Our Promise for a Better Tomorrow',
            'subheading' => 'About Us',
            'content_json' => [
                'button_text' => 'About Us',
                'title_parts' => [
                    ['text' => 'Your Health,', 'color' => '#000000'],
                    ['text' => 'Our Promise', 'color' => '#E62D5B'],
                    ['text' => 'for a', 'color' => '#000000'],
                    ['text' => 'Better Tomorrow', 'color' => '#17687F']
                ],
                'description' => 'Dedicated to caring for you and your family with compassion, trust, and medical excellence.',
                'hero_image' => '/images/about-hero.png'
            ],
            'position' => 1,
            'is_visible' => true
        ]);
        echo "✅ Created About Hero section with ID: {$aboutHeroSection->id}\n";
    } else {
        echo "ℹ️ About Hero section already exists with ID: {$aboutHeroSection->id}\n";
    }
    
    echo "\n🎉 About Us page setup completed successfully!\n";
    echo "📝 Page URL: " . url('/about-us') . "\n";
    echo "🔧 Admin Panel: Edit via Filament Pages section\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "📍 File: " . $e->getFile() . " (Line: " . $e->getLine() . ")\n";
}
