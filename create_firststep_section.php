<?php
// Quick script to create FirstStep section
require_once 'vendor/autoload.php';

// Load Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

use App\Models\Page;
use App\Models\Section;

echo "Creating FirstStep Section...\n";
echo "============================\n";

// Get or create home page
$page = Page::where('slug', 'home')->first();

if (!$page) {
    $page = Page::create([
        'slug' => 'home',
        'title' => 'Aitken Grove Medical & Aesthetic Center',
        'subtitle' => 'Your premier destination for medical and aesthetic treatments',
        'hero_title' => 'Your Health Our Priority',
        'hero_description' => 'From routine check-ups to specialized treatments, we provide quality healthcare in a caring and supportive environment.',
        'hero_cta_label' => 'Book a Consultant',
        'hero_cta_url' => '#',
        'meta_title' => 'Aitken Grove Medical & Aesthetic Center - Quality Healthcare',
        'meta_description' => 'Premier medical and aesthetic treatments with state-of-the-art facilities and expert medical professionals.',
        'published_at' => now()
    ]);
    echo "Created home page with ID: {$page->id}\n";
} else {
    echo "Found existing home page with ID: {$page->id}\n";
}

// Check if FirstStep section already exists
$existingSection = Section::where('page_id', $page->id)
    ->where('key', 'firststep')
    ->first();

if ($existingSection) {
    echo "FirstStep section already exists!\n";
    echo "- ID: {$existingSection->id}\n";
    echo "- Position: {$existingSection->position}\n";
    echo "- Visible: " . ($existingSection->is_visible ? 'Yes' : 'No') . "\n";
    
    if (!$existingSection->is_visible) {
        $existingSection->is_visible = true;
        $existingSection->save();
        echo "✓ Made section visible\n";
    }
} else {
    // Create FirstStep section
    $section = Section::create([
        'page_id' => $page->id,
        'key' => 'firststep',
        'heading' => 'Take the First Step Toward Better Health',
        'subheading' => 'Book your appointment with our trusted doctors today',
        'content_json' => [
            'title' => 'Take the First Step Toward Better Health',
            'description' => 'Book your appointment with our trusted doctors today and get the right care without long waits.',
            'cta_label' => 'Book a Consultant',
            'cta_url' => '#'
        ],
        'position' => 5,
        'is_visible' => true
    ]);

    echo "✓ FirstStep section created successfully!\n";
    echo "- Section ID: {$section->id}\n";
    echo "- Position: {$section->position}\n";
    echo "- Key: {$section->key}\n";
}

// Show all current sections
echo "\nCurrent sections on home page:\n";
echo "==============================\n";
$sections = Section::where('page_id', $page->id)->orderBy('position')->get();

foreach ($sections as $sec) {
    $status = $sec->is_visible ? '✓ visible' : '✗ hidden';
    echo "{$sec->position}. {$sec->key} - {$sec->heading} ({$status})\n";
}

echo "\nDone! Visit your homepage to see the FirstStep section.\n";
