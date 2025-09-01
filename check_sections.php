<?php
/**
 * Quick script to check existing sections and create specialists if needed
 */

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap/app.php';

use App\Models\Page;
use App\Models\Section;

echo "🔍 Checking existing sections...\n\n";

try {
    $pages = Page::with('sections')->get();
    
    foreach ($pages as $page) {
        echo "📄 Page: {$page->title} (slug: {$page->slug})\n";
        
        if ($page->sections->count() > 0) {
            foreach ($page->sections as $section) {
                echo "  📋 Section: {$section->key} - {$section->heading} (position: {$section->position}, visible: " . ($section->is_visible ? 'yes' : 'no') . ")\n";
                
                if ($section->key === 'specialists') {
                    echo "    👨‍⚕️ Found specialists section!\n";
                    if (is_array($section->content_json) && isset($section->content_json['specialists'])) {
                        echo "    👥 Specialists count: " . count($section->content_json['specialists']) . "\n";
                    }
                }
            }
        } else {
            echo "  (no sections)\n";
        }
        echo "\n";
    }

    // If no specialists section found, create it
    $homePage = Page::where('slug', 'home')->first();
    if ($homePage) {
        $specialistsSection = $homePage->sections()->where('key', 'specialists')->first();
        
        if (!$specialistsSection) {
            echo "🚀 Creating specialists section...\n";
            
            $section = Section::create([
                'page_id' => $homePage->id,
                'key' => 'specialists',
                'heading' => 'Meet Our Specialists',
                'subheading' => 'Trusted, experienced doctors dedicated to your care',
                'content_json' => [
                    'title' => 'Meet Our Specialists',
                    'description' => 'Trusted, experienced doctors dedicated to your care.',
                    'specialists' => [
                        [
                            'name' => 'Dr. Salman Raza',
                            'role' => 'Senior Orthopedic Surgeon',
                            'image' => null
                        ],
                        [
                            'name' => 'Dr. Ayesha Khan',
                            'role' => 'Consultant Cardiologist',
                            'image' => null
                        ],
                        [
                            'name' => 'Dr. Maria Ahmed',
                            'role' => 'Pediatrician & Child Specialist',
                            'image' => null
                        ],
                        [
                            'name' => 'Dr. Hassan Malik',
                            'role' => 'Neurologist',
                            'image' => null
                        ],
                        [
                            'name' => 'Dr. Sarah Johnson',
                            'role' => 'Gynecologist',
                            'image' => null
                        ]
                    ]
                ],
                'position' => 4,
                'is_visible' => true,
            ]);
            
            echo "✅ Specialists section created with ID: {$section->id}\n";
        } else {
            echo "✅ Specialists section already exists!\n";
        }
    } else {
        echo "❌ Home page not found!\n";
    }

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "📝 File: " . $e->getFile() . " Line: " . $e->getLine() . "\n";
}
