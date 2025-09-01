<?php
// Create testimonials section for home page
require_once 'vendor/autoload.php';

// Load Laravel
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Page;
use App\Models\Section;

echo "Creating Testimonials Section\n";
echo "============================\n\n";

// Get or create home page
$homePage = Page::firstOrCreate(
    ['slug' => 'home'],
    [
        'title' => 'Aitken Grove Medical & Aesthetic Center',
        'subtitle' => 'Trusted Healthcare for All Ages',
        'hero_cta_label' => 'Book Appointment',
        'hero_cta_url' => '/appointments',
        'meta_title' => 'Aitken Grove Medical Center - Trusted Healthcare',
        'meta_description' => 'At Aitken Grove Medical Center, we provide trusted healthcare for all ages. Expert doctors, modern facilities, and patient-first service.',
        'published_at' => now(),
    ]
);

echo "✅ Home page ready: " . $homePage->title . "\n";
echo "Page ID: " . $homePage->id . "\n\n";

// Create testimonials section
$testimonialsSection = Section::firstOrCreate(
    [
        'page_id' => $homePage->id,
        'key' => 'testimonials'
    ],
    [
        'heading' => 'Trusted by Thousands',
        'subheading' => 'Loved by Patients',
        'content_json' => [
            'title' => 'Trusted by Thousands',
            'subtitle' => 'Loved by Patients',
            'items' => [
                [
                    'quote' => 'The doctors here are amazing! They took great care of me and explained everything clearly. I felt comfortable and well cared for throughout my visit. The staff is professional and the facility is modern.',
                    'author' => 'Sarah Johnson',
                    'role' => 'Patient'
                ],
                [
                    'quote' => 'Professional staff and excellent service. The consultation was thorough and the treatment plan was perfectly tailored to my needs. I highly recommend this medical center to anyone looking for quality healthcare.',
                    'author' => 'Michael Chen',
                    'role' => 'Patient'
                ],
                [
                    'quote' => 'Outstanding healthcare experience! The facility is modern, clean, and the medical team is incredibly knowledgeable. My family trusts them completely for all our medical needs.',
                    'author' => 'Emily Davis',
                    'role' => 'Patient'
                ],
                [
                    'quote' => 'I have been coming here for years and the care is consistently excellent. The doctors listen carefully and provide thorough explanations. The appointment booking process is smooth and efficient.',
                    'author' => 'Robert Wilson',
                    'role' => 'Patient'
                ],
                [
                    'quote' => 'Great experience with the pediatric team! My children feel comfortable here and the doctors are wonderful with kids. The waiting area is child-friendly and the staff is very patient.',
                    'author' => 'Jennifer Martinez',
                    'role' => 'Patient'
                ]
            ]
        ],
        'position' => 6, // Position it after specialists section
        'is_visible' => true,
    ]
);

if ($testimonialsSection->wasRecentlyCreated) {
    echo "✅ Testimonials section created successfully!\n";
} else {
    echo "✅ Testimonials section already exists!\n";
}

echo "Position: " . $testimonialsSection->position . "\n";
echo "Visible: " . ($testimonialsSection->is_visible ? 'Yes' : 'No') . "\n";
echo "Testimonials count: " . count($testimonialsSection->content_json['items']) . "\n\n";

echo "🎉 Testimonials section is ready!\n";
echo "Visit your home page to see the testimonials section.\n";
echo "Manage content via: Filament Admin > Sections > Edit Testimonials\n";
?>