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

        // Create Testimonials Section with default content
        Section::firstOrCreate(
            [
                'page_id' => $page->id,
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
    }
}
