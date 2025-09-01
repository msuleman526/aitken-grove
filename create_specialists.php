<?php
/**
 * Quick script to add specialists section to existing home page
 * Run this with: php create_specialists.php
 */

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap/app.php';

use App\Models\Page;
use App\Models\Section;

echo "🚀 Adding Specialists Section to Home Page...\n";

try {
    // Find the home page
    $page = Page::where('slug', 'home')->first();
    
    if (!$page) {
        echo "❌ Home page not found! Creating it first...\n";
        $page = Page::create([
            'slug' => 'home',
            'title' => 'Aitken Grove Medical & Aesthetic Center',
            'subtitle' => 'Trusted Healthcare for All Ages',
            'hero_cta_label' => 'Book Appointment',
            'hero_cta_url' => '/appointments',
            'meta_title' => 'Aitken Grove Medical Center - Trusted Healthcare',
            'meta_description' => 'At Aitken Grove Medical Center, we provide trusted healthcare for all ages. Expert doctors, modern facilities, and patient-first service.',
            'published_at' => now(),
        ]);
        echo "✅ Home page created!\n";
    }

    // Create or update Specialists Section
    $section = Section::updateOrCreate(
        [
            'page_id' => $page->id,
            'key' => 'specialists'
        ],
        [
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
        ]
    );

    echo "✅ Specialists Section created successfully!\n";
    echo "📍 Section positioned at: {$section->position}\n";
    echo "👨‍⚕️ Number of specialists: " . count($section->content_json['specialists']) . "\n";
    echo "🖼️ Default image: public/images/specialist.png\n";
    echo "\n🎉 Done! Visit your home page to see the specialists section.\n";

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "📝 Stack trace: " . $e->getTraceAsString() . "\n";
}
