<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Page;
use App\Models\Section;

class SeedSpecialistsSection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:specialists';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the Specialists section for the home page';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Seeding Specialists Section...');

        // Find the home page
        $page = Page::where('slug', 'home')->first();
        
        if (!$page) {
            $this->error('Home page not found! Run php artisan seed:landing first.');
            return 1;
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

        $this->info('✅ Specialists Section created successfully!');
        $this->info('📍 Section positioned at: ' . $section->position);
        $this->info('👨‍⚕️ Number of specialists: ' . count($section->content_json['specialists'] ?? []));
        $this->info('🖼️ Default image: public/images/specialist.png');
        
        return 0;
    }
}
