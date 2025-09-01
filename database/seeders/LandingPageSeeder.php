<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\Section;
use Carbon\Carbon;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the home/landing page
        $page = Page::firstOrCreate(
            ['slug' => 'home'],
            [
                'title' => 'Aitken Grove Medical & Aesthetic Center',
                'subtitle' => 'Trusted Healthcare for All Ages',
                'hero_cta_label' => 'Book Appointment',
                'hero_cta_url' => '/appointments',
                'meta_title' => 'Aitken Grove Medical Center - Trusted Healthcare',
                'meta_description' => 'At Aitken Grove Medical Center, we provide trusted healthcare for all ages. Expert doctors, modern facilities, and patient-first service.',
                'published_at' => Carbon::now(),
            ]
        );

        // Create Trust Section with default content from screenshot
        Section::firstOrCreate(
            [
                'page_id' => $page->id,
                'key' => 'trust'
            ],
            [
                'heading' => 'Care You Can Trust',
                'subheading' => 'Why thousands of patients choose us',
                'content_json' => [
                    'title' => 'Care You Can Trust',
                    'description' => 'At Aitken Grove Medical Center, we believe healthcare should be more than just treatment — it should be compassion, trust, and excellence combined. That\'s why thousands of patients choose us every year.',
                    'points' => [
                        [
                            'title' => '100+ Specialist Doctors',
                            'description' => 'Expert doctors across multiple specialties for complete care.',
                            'icon' => 'trust1.png'
                        ],
                        [
                            'title' => '20+ Years of Excellence',
                            'description' => 'Decades of trusted, reliable, patient-first service.',
                            'icon' => 'trust2.png'
                        ],
                        [
                            'title' => 'Same-Day Appointments',
                            'description' => 'Quick bookings and minimal waiting time.',
                            'icon' => 'trust3.png'
                        ],
                        [
                            'title' => 'Modern Facilities & Equipment',
                            'description' => 'Advanced technology for accurate results & effective care.',
                            'icon' => 'trust4.png'
                        ],
                        [
                            'title' => 'Comprehensive Healthcare',
                            'description' => 'From checkups to treatments — all under one roof.',
                            'icon' => 'trust5.png'
                        ]
                    ]
                ],
                'position' => 3, // Position it after caring and specialised treatment sections
                'is_visible' => true,
            ]
        );

        // Create Specialists Section with default content
        Section::firstOrCreate(
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
                            'image' => null // Will use default placeholder
                        ],
                        [
                            'name' => 'Dr. Ayesha Khan',
                            'role' => 'Consultant Cardiologist',
                            'image' => null // Will use default placeholder
                        ],
                        [
                            'name' => 'Dr. Maria Ahmed',
                            'role' => 'Pediatrician & Child Specialist',
                            'image' => null // Will use default placeholder
                        ],
                        [
                            'name' => 'Dr. Hassan Malik',
                            'role' => 'Neurologist',
                            'image' => null // Will use default placeholder
                        ],
                        [
                            'name' => 'Dr. Sarah Johnson',
                            'role' => 'Gynecologist',
                            'image' => null // Will use default placeholder
                        ]
                    ]
                ],
                'position' => 4, // Position it after trust section
                'is_visible' => true,
            ]
        );
    }
}
