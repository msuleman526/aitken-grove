<?php
// Quick script to check current sections
require_once 'vendor/autoload.php';

// Load Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

use App\Models\Page;
use App\Models\Section;

// Get the home page
$page = Page::where('slug', 'home')->first();

if ($page) {
    echo "Home page found: " . $page->title . "\n";
    echo "Page ID: " . $page->id . "\n\n";
    
    // Get all sections for this page
    $sections = Section::where('page_id', $page->id)->orderBy('position')->get();
    
    echo "Current sections:\n";
    echo "================\n";
    
    foreach ($sections as $section) {
        echo "Position: " . $section->position . 
             " | Key: " . $section->key . 
             " | Heading: " . $section->heading .
             " | Visible: " . ($section->is_visible ? 'Yes' : 'No') . "\n";
    }
    
    // Check if firststep section exists
    $firststepExists = $sections->where('key', 'firststep')->first();
    echo "\nFirstStep section exists: " . ($firststepExists ? 'Yes' : 'No') . "\n";
    
    if ($firststepExists) {
        echo "FirstStep section details:\n";
        echo "- Position: " . $firststepExists->position . "\n";
        echo "- Visible: " . ($firststepExists->is_visible ? 'Yes' : 'No') . "\n";
        echo "- Content: " . json_encode($firststepExists->content_json, JSON_PRETTY_PRINT) . "\n";
    }
} else {
    echo "Home page not found.\n";
}
