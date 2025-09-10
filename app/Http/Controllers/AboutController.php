<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Section;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function show()
    {
        // Get the about-us page or create it
        $page = Page::where('slug', 'about-us')->first();
        
        if (!$page) {
            // Create a default about-us page
            $page = Page::create([
                'slug' => 'about-us',
                'title' => 'About Us - Aitken Grove Medical & Aesthetic Center',
                'subtitle' => 'Learn about our commitment to your health',
                'hero_title' => 'About Us',
                'hero_description' => 'Your Health, Our Promise for a Better Tomorrow',
                'meta_title' => 'About Us - Aitken Grove Medical & Aesthetic Center',
                'meta_description' => 'Learn about Aitken Grove Medical & Aesthetic Center. Dedicated to caring for you and your family with compassion, trust, and medical excellence.',
                'canonical_url' => url('/about-us'),
                'meta_robots' => 'index, follow',
                'published_at' => now()
            ]);
        }
        
        // Get or create the About Hero section
        $aboutHeroSection = Section::where('page_id', $page->id)
            ->where('key', 'about_hero')
            ->first();
            
        if (!$aboutHeroSection) {
            $aboutHeroSection = Section::create([
                'page_id' => $page->id,
                'key' => 'about_hero',
                'heading' => 'Your Health, Our Promise for a Better Tomorrow',
                'subheading' => 'About Us',
                'content_json' => [
                    'button_text' => 'About Us',
                    'title_parts' => [
                        ['text' => 'Your Health,', 'color' => '#000000'],
                        ['text' => 'Our Promise', 'color' => '#E62D5B'],
                        ['text' => 'for a', 'color' => '#000000'],
                        ['text' => 'Better Tomorrow', 'color' => '#17687F']
                    ],
                    'description' => 'Dedicated to caring for you and your family with compassion, trust, and medical excellence.',
                    'hero_image' => '/images/about-hero.png'
                ],
                'position' => 1,
                'is_visible' => true
            ]);
        }
        
        // Get or create the Heart section
        $heartSection = Section::where('page_id', $page->id)
            ->where('key', 'heart')
            ->first();
            
        if (!$heartSection) {
            $heartSection = Section::create([
                'page_id' => $page->id,
                'key' => 'heart',
                'heading' => 'The Heart Behind What We Do',
                'subheading' => null,
                'content_json' => [
                    'title' => '<span class="title-part-1">The Heart Behind</span><br><span class="title-part-2">What We Do</span>',
                    'description' => 'At Aitken Grove Medical Center, our mission is simple — to provide compassionate, reliable, and patient-centered healthcare that empowers families to live healthier, happier lives. We combine modern medical practices with a personal touch, ensuring every patient feels valued, supported, and cared for.',
                    'points' => [
                        ['text' => 'We listen, we care, and we treat every patient with dignity and kindness.'],
                        ['text' => 'We hold ourselves to the highest standards in medical expertise and patient service.'],
                        ['text' => 'We believe in honesty, transparency, and doing what\'s best for our patients.'],
                        ['text' => 'We continuously adapt and embrace new medical solutions to improve patient outcomes.']
                    ],
                    'image' => null // Will use default heart.png
                ],
                'position' => 2,
                'is_visible' => true
            ]);
        }
        
        // Get or create the Gallery section
        $gallerySection = Section::where('page_id', $page->id)
            ->where('key', 'gallery')
            ->first();
            
        if (!$gallerySection) {
            $gallerySection = Section::create([
                'page_id' => $page->id,
                'key' => 'gallery',
                'heading' => 'Our Gallery',
                'subheading' => null,
                'content_json' => [
                    'images' => [] // Will use default images from public/images/gallery/
                ],
                'position' => 3,
                'is_visible' => true
            ]);
        }
        
        // Get or create the Journey section
        $journeySection = Section::where('page_id', $page->id)
            ->where('key', 'journey')
            ->first();
            
        if (!$journeySection) {
            $journeySection = Section::create([
                'page_id' => $page->id,
                'key' => 'journey',
                'heading' => 'A Journey of Compassion, Trust, and Dedication',
                'subheading' => null,
                'content_json' => [
                    'title' => '<span class="title-normal">A Journey of</span> <span class="title-highlight">Compassion,</span><br><span class="title-highlight">Trust, and Dedication</span> <span class="title-normal">to</span><br><span class="title-accent">Better Health</span> <span class="title-normal">for</span> <span class="title-highlight2">Every</span><br><span class="title-accent2">Generation</span>',
                    'description' => '<p>From the very beginning, our vision has been simple yet powerful — to create a place where people feel truly cared for. Not just treated. What started as a small initiative has grown into a trusted healthcare service that serves individuals and families with the highest level of compassion and professionalism. Every step of the way, we\'ve strived to ensure that patients feel respected, heard, and supported in their journey toward better health.</p><p>As we\'ve grown, so has our commitment to excellence. By blending modern medical advancements with a personalized approach, we\'ve been able to deliver care that goes beyond treatment — care that builds lasting trust. Each patient interaction is a chance for us to make a difference, and it\'s this belief that keeps us dedicated to raising the standard of healthcare in our community.</p><p>Today, our story continues with the same passion that fueled our beginnings. We remain deeply rooted in our mission to support every life we touch, expanding our services to meet evolving needs while never losing sight of the values that brought us here. For us, it\'s not just about medicine — it\'s about being a reliable partner in your health and wellness journey, for today and for generations to come.</p>',
                    'image' => null // Will use default heart2.png
                ],
                'position' => 4,
                'is_visible' => true
            ]);
        }
        
        // Get or create the About Counts section
        $aboutCountsSection = Section::where('page_id', $page->id)
            ->where('key', 'about_counts')
            ->first();
            
        if (!$aboutCountsSection) {
            $aboutCountsSection = Section::create([
                'page_id' => $page->id,
                'key' => 'about_counts',
                'heading' => 'Our Achievements',
                'subheading' => null,
                'content_json' => [
                    'counts' => [
                        ['number' => '15+', 'text' => 'Years of Care'],
                        ['number' => '10,000+', 'text' => 'Happy Patients'],
                        ['number' => '20+', 'text' => 'Expert Doctors'],
                        ['number' => '5-Star', 'text' => 'Patient Reviews']
                    ]
                ],
                'position' => 6,
                'is_visible' => true
            ]);
        }
        
        // Get specialists section from home page to reuse
        $specialistsSection = Section::where('key', 'specialists')
            ->where('is_visible', true)
            ->first();
            
        // Get firststep section from home page to reuse
        $firststepSection = Section::where('key', 'firststep')
            ->where('is_visible', true)
            ->first();
            
        // Get testimonials section from home page to reuse
        $testimonialsSection = Section::where('key', 'testimonials')
            ->where('is_visible', true)
            ->first();
        
        return view('about.index', compact(
            'page', 
            'aboutHeroSection', 
            'heartSection', 
            'gallerySection', 
            'journeySection', 
            'aboutCountsSection',
            'specialistsSection',
            'firststepSection',
            'testimonialsSection'
        ));
    }
}
