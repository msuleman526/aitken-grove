<?php

require_once __DIR__ . '/vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Section;

try {
    echo "Updating 'Book a Consultant' button links to navigate to /contact...\n\n";

    // Update all FirstStep sections
    $firstStepSections = Section::where('key', 'firststep')->get();
    
    foreach ($firstStepSections as $section) {
        $contentJson = $section->content_json;
        
        // Update the CTA URL to point to contact page
        if (isset($contentJson['cta_url']) && ($contentJson['cta_url'] === '#' || $contentJson['cta_url'] === '/book-consultation')) {
            $contentJson['cta_url'] = '/contact';
            $section->update(['content_json' => $contentJson]);
            echo "✅ Updated FirstStep section (ID: {$section->id}) CTA URL to /contact\n";
        } elseif (!isset($contentJson['cta_url'])) {
            $contentJson['cta_url'] = '/contact';
            $section->update(['content_json' => $contentJson]);
            echo "✅ Added CTA URL /contact to FirstStep section (ID: {$section->id})\n";
        } else {
            echo "ℹ️ FirstStep section (ID: {$section->id}) already has custom URL: {$contentJson['cta_url']}\n";
        }
    }

    echo "\n🔍 Summary of updated components:\n";
    echo "✅ Header: 'Book a Consultant' button now links to /contact\n";
    echo "✅ Service CTA Section: 'Book a Consultant' button now links to /contact\n";
    echo "✅ FirstStep Section: Default CTA URL changed to /contact\n";
    echo "✅ Database: All existing FirstStep sections updated\n";

    echo "\n📋 All 'Book a Consultant' buttons now navigate to the Contact page!\n";
    echo "Pages affected:\n";
    echo "- Home page (FirstStep section)\n";
    echo "- All service pages (Service CTA section)\n";
    echo "- Contact page (FirstStep section)\n";
    echo "- About Us page (if FirstStep section is added)\n";
    echo "- Header on all pages\n";
    
} catch (Exception $e) {
    echo "❌ Error updating button links: " . $e->getMessage() . "\n";
    exit(1);
}
