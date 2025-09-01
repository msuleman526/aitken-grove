<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Page;
use App\Models\Section;

class SeedTestimonialsSection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:testimonials';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create testimonials section for home page';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Creating Testimonials Section...');
        
        // Get home page
        $homePage = Page::where('slug', 'home')->first();
        
        if (!$homePage) {
            $this->error('Home page not found! Please run: php artisan db:seed --class=LandingPageSeeder');
            return 1;
        }
        
        $this->info('Home page found: ' . $homePage->title);
        
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
                'position' => 6, // Position after specialists section
                'is_visible' => true,
            ]
        );
        
        if ($testimonialsSection->wasRecentlyCreated) {
            $this->info('✅ Testimonials section created successfully!');
        } else {
            $this->info('✅ Testimonials section already exists!');
        }
        
        $this->info('Position: ' . $testimonialsSection->position);
        $this->info('Visible: ' . ($testimonialsSection->is_visible ? 'Yes' : 'No'));
        $this->info('Testimonials count: ' . count($testimonialsSection->content_json['items']));
        
        $this->info('');
        $this->info('🎉 Testimonials section is ready!');
        $this->info('Visit your home page to see the testimonials section.');
        $this->info('Manage content via: Filament Admin > Sections > Edit Testimonials');
        
        return 0;
    }
}
