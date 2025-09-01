<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Section;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function show()
    {
        // Get the home page or create a default one
        $page = Page::where('slug', 'home')->first();
        
        if (!$page) {
            // Create a default home page
            $page = Page::create([
                'slug' => 'home',
                'title' => 'Aitken Grove Medical & Aesthetic Center',
                'subtitle' => 'Your premier destination for medical and aesthetic treatments',
                'hero_title' => 'Your Health Our Priority',
                'hero_description' => 'From routine check-ups to specialized treatments, we provide quality healthcare in a caring and supportive environment.',
                'hero_cta_label' => 'Book a Consultant',
                'hero_cta_url' => '#',
                'hero_stats' => [
                    [
                        'number' => '30+',
                        'label' => 'Tests Available',
                        'icon' => 'box1'
                    ],
                    [
                        'number' => '50+',
                        'label' => 'Doctors Available',
                        'icon' => 'box2'
                    ],
                    [
                        'number' => '1000+',
                        'label' => 'Patients Treated',
                        'icon' => 'box3'
                    ]
                ],
                'opening_hours' => '8:00 AM to 11:00 PM',
                'contact_phone' => '+1 234 5678 900',
                'contact_email' => 'aitkengrove@gmail.com',
                'meta_title' => 'Aitken Grove Medical & Aesthetic Center - Quality Healthcare',
                'meta_description' => 'Premier medical and aesthetic treatments with state-of-the-art facilities and expert medical professionals.',
                'published_at' => now()
            ]);
        }
        
        // Load sections for the page
        $sections = Section::where('page_id', $page->id)
            ->where('is_visible', true)
            ->orderBy('position')
            ->get();
        
        // Create default caring section if it doesn't exist
        $caringSection = $sections->where('key', 'caring')->first();
        if (!$caringSection) {
            $caringSection = Section::create([
                'page_id' => $page->id,
                'key' => 'caring',
                'heading' => 'Caring for You',
                'subheading' => 'Every Step of the Way',
                'content_json' => [
                    'title' => 'Caring for You, Every Step of the Way',
                    'description' => 'We provide trusted healthcare for all ages. Our team combines experience, compassion, and modern treatments to keep you and your family healthy.',
                    'points' => [
                        ['text' => 'Care for children, adults & seniors'],
                        ['text' => 'Experienced doctors across specialities'],
                        ['text' => 'Advanced facilities & modern treatments'],
                        ['text' => 'Preventive & personalized care plans'],
                        ['text' => 'Patient-centered approach with personalized care plans']
                    ]
                ],
                'position' => 1,
                'is_visible' => true
            ]);
            
            // Refresh sections collection
            $sections = Section::where('page_id', $page->id)
                ->where('is_visible', true)
                ->orderBy('position')
                ->get();
        }
        
        // Create default specialised treatment section if it doesn't exist
        $specialisedTreatmentSection = $sections->where('key', 'specialised_treatment')->first();
        if (!$specialisedTreatmentSection) {
            $specialisedTreatmentSection = Section::create([
                'page_id' => $page->id,
                'key' => 'specialised_treatment',
                'heading' => 'Our Specialised Treatment Services',
                'subheading' => 'Comprehensive medical care across multiple disciplines',
                'content_json' => [
                    'title' => 'Our Specialised Treatment Services',
                    'description' => 'We offer comprehensive specialized care across multiple medical disciplines, ensuring you receive expert treatment tailored to your unique health needs.',
                    'cards' => [
                        [
                            'title' => 'Family Health Care',
                            'description' => 'Complete care for kids, adults, and seniors.',
                            'icon' => 'care1.png'
                        ],
                        [
                            'title' => 'Aesthetics / Cosmetics',
                            'description' => 'Safe treatments designed to enhance your look.',
                            'icon' => 'care2.png'
                        ],
                        [
                            'title' => 'Circumcision Clinic',
                            'description' => 'Professional, private circumcision services.',
                            'icon' => 'care3.png'
                        ],
                        [
                            'title' => 'Skin Cancer Care',
                            'description' => 'Early detection and safe treatment.',
                            'icon' => 'care4.png'
                        ],
                        [
                            'title' => 'Immunisation',
                            'description' => 'Vaccines and boosters for all ages.',
                            'icon' => 'care5.png'
                        ],
                        [
                            'title' => 'Travel Advice',
                            'description' => 'Stay protected before you travel abroad.',
                            'icon' => 'care6.png'
                        ],
                        [
                            'title' => 'Weight Loss Clinic',
                            'description' => 'Personalised plans for healthy results.',
                            'icon' => 'care7.png'
                        ],
                        [
                            'title' => 'Medical Cannabis',
                            'description' => 'Expert care for eligible conditions.',
                            'icon' => 'care8.png'
                        ],
                        [
                            'title' => 'Pregnancy Care',
                            'description' => 'Support from check-ups to delivery.',
                            'icon' => 'care9.png'
                        ],
                        [
                            'title' => 'Men\'s Health',
                            'description' => 'Dedicated screenings and treatments.',
                            'icon' => 'care10.png'
                        ],
                        [
                            'title' => 'Women\'s Health',
                            'description' => 'Complete care for every stage of life.',
                            'icon' => 'care11.png'
                        ],
                        [
                            'title' => 'Iron Infusion',
                            'description' => 'Quick and effective iron therapy.',
                            'icon' => 'care12.png'
                        ],
                        [
                            'title' => 'Mental Health',
                            'description' => 'Counselling and treatment support.',
                            'icon' => 'care13.png'
                        ],
                        [
                            'title' => 'Work Cover & TAC',
                            'description' => 'Medical care for work and TAC claims.',
                            'icon' => 'care14.png'
                        ]
                    ]
                ],
                'position' => 2,
                'is_visible' => true
            ]);
            
            // Refresh sections collection
            $sections = Section::where('page_id', $page->id)
                ->where('is_visible', true)
                ->orderBy('position')
                ->get();
        }
        
        // Create default specialists section if it doesn't exist
        $specialistsSection = $sections->where('key', 'specialists')->first();
        if (!$specialistsSection) {
            $specialistsSection = Section::create([
                'page_id' => $page->id,
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
                'is_visible' => true
            ]);
            
            // Refresh sections collection
            $sections = Section::where('page_id', $page->id)
                ->where('is_visible', true)
                ->orderBy('position')
                ->get();
        }
        
        // Create default firststep section if it doesn't exist
        $firststepSection = $sections->where('key', 'firststep')->first();
        if (!$firststepSection) {
            $firststepSection = Section::create([
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
            
            // Refresh sections collection
            $sections = Section::where('page_id', $page->id)
                ->where('is_visible', true)
                ->orderBy('position')
                ->get();
        }
        
        // Create default testimonials section if it doesn't exist
        $testimonialsSection = $sections->where('key', 'testimonials')->first();
        if (!$testimonialsSection) {
            $testimonialsSection = Section::create([
                'page_id' => $page->id,
                'key' => 'testimonials',
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
                'position' => 6,
                'is_visible' => true
            ]);
            
            // Refresh sections collection
            $sections = Section::where('page_id', $page->id)
                ->where('is_visible', true)
                ->orderBy('position')
                ->get();
        }
        
        return view('landing.index', compact('page', 'sections'));
    }
}
