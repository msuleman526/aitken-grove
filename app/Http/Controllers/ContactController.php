<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Section;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        // Get the contact page or create it
        $page = Page::where('slug', 'contact')->first();
        
        if (!$page) {
            // Create a default contact page
            $page = Page::create([
                'slug' => 'contact',
                'title' => 'Contact Us - Aitken Grove Medical & Aesthetic Center',
                'subtitle' => 'Get in touch with our medical team',
                'hero_title' => 'Contact Us',
                'hero_description' => 'We\'re here to help. Get in touch with us anytime.',
                'meta_title' => 'Contact Us - Aitken Grove Medical & Aesthetic Center',
                'meta_description' => 'Contact Aitken Grove Medical & Aesthetic Center. Reach out to our expert medical team for appointments, inquiries, and healthcare support.',
                'canonical_url' => url('/contact'),
                'meta_robots' => 'index, follow',
                'published_at' => now()
            ]);
        }
        
        // Get or create the HeroContact section
        $heroContactSection = Section::where('page_id', $page->id)
            ->where('key', 'hero_contact')
            ->first();
            
        if (!$heroContactSection) {
            $heroContactSection = Section::create([
                'page_id' => $page->id,
                'key' => 'hero_contact',
                'heading' => 'We\'re Here to Help',
                'subheading' => 'Get in Touch with Us Anytime',
                'content_json' => [
                    'button_text' => 'Contact Us',
                    'title_parts' => [
                        ['text' => 'We\'re Here', 'color' => '#5EC6C8'],
                        ['text' => 'to Help', 'color' => '#000000'],
                        ['text' => 'Get in Touch', 'color' => '#E62D5B'],
                        ['text' => 'with Us', 'color' => '#000000'],
                        ['text' => 'Anytime', 'color' => '#17687F']
                    ],
                    'description' => 'Fill in the form below and our team will get back to you as soon as possible.',
                    'contact_info' => [
                        [
                            'icon' => '/icons/footer/phone.png',
                            'text' => '+1 234 5678 900'
                        ],
                        [
                            'icon' => '/icons/footer/mail.png',
                            'text' => 'aitkengrove@gmail.com'
                        ],
                        [
                            'icon' => '/icons/footer/location.png',
                            'text' => '123 Medical District, Health City, HC 12345'
                        ]
                    ],
                    'form_title' => 'Send Us a Message',
                    'form_description' => 'Fill in the form below and our team will get back to you as soon as possible.'
                ],
                'position' => 1,
                'is_visible' => true
            ]);
        }
        
        // Get or create the FirstStep section
        $firstStepSection = Section::where('page_id', $page->id)
            ->where('key', 'firststep')
            ->first();
            
        if (!$firstStepSection) {
            $firstStepSection = Section::create([
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
                'position' => 2,
                'is_visible' => true
            ]);
        }
        
        return view('contact.index', compact('page', 'heroContactSection', 'firstStepSection'));
    }
}
