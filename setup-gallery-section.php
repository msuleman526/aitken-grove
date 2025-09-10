<?php

require_once __DIR__ . '/vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Page;
use App\Models\Section;

try {
    echo "Setting up Gallery Section for About Us page...\n";

    // Get the about-us page
    $page = Page::where('slug', 'about-us')->first();
    
    if (!$page) {
        echo "About-us page not found. Please visit /about-us first to create the page.\n";
        exit(1);
    }

    // Check if Gallery section already exists
    $gallerySection = Section::where('page_id', $page->id)
        ->where('key', 'gallery')
        ->first();

    if (!$gallerySection) {
        // Create the Gallery section
        $gallerySection = Section::create([
            'page_id' => $page->id,
            'key' => 'gallery',
            'heading' => 'Our Gallery',
            'subheading' => null,
            'content_json' => [
                'images' => [] // Will use default images from public/images/gallery/
            ],
            'position' => 3,
            'is_visible' => true
        ]);

        echo "✅ Gallery section created successfully!\n";
    } else {
        echo "Gallery section already exists.\n";
    }

    // Update About Counts section position to 4 if needed
    $aboutCountsSection = Section::where('page_id', $page->id)
        ->where('key', 'about_counts')
        ->first();
        
    if ($aboutCountsSection && $aboutCountsSection->position !== 4) {
        $aboutCountsSection->update(['position' => 4]);
        echo "✅ Updated About Counts section position to 4.\n";
    }

    echo "\n✅ Gallery Section setup completed successfully!\n";
    echo "Gallery section specifications:\n";
    echo "- Height: 200px (full page width: 1440px)\n";
    echo "- Image size: 300x200px with 20px border-radius\n";
    echo "- Scrolling animation: Left-to-right continuous scroll\n";
    echo "- Default images: 10 images from public/images/gallery/image1.png to image10.png\n";
    echo "- Hover effect: Pauses animation and scales images\n";
    echo "- Responsive design: Adapts to mobile devices\n";
    echo "- Admin upload: Can upload custom gallery images via Filament\n";
    echo "\nGallery Images Management:\n";
    echo "- Default: Uses images from public/images/gallery/ (image1.png to image10.png)\n";
    echo "- Custom: Upload via Admin Panel → Sections → Gallery Section\n";
    echo "- Format: 300x200px recommended, accepts JPG/PNG/WebP\n";
    echo "- Unlimited: Up to 50 custom images supported\n";
    echo "\nVisit your about-us page to see the Gallery section!\n";
    
} catch (Exception $e) {
    echo "❌ Error setting up Gallery section: " . $e->getMessage() . "\n";
    exit(1);
}
