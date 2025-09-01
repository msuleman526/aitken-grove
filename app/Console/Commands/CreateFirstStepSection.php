<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Page;
use App\Models\Section;

class CreateFirstStepSection extends Command
{
    protected $signature = 'create:firststep-section';
    protected $description = 'Create the FirstStep section for the home page';

    public function handle()
    {
        // Get or create home page
        $page = Page::firstOrCreate(
            ['slug' => 'home'],
            [
                'title' => 'Aitken Grove Medical & Aesthetic Center',
                'subtitle' => 'Your premier destination for medical and aesthetic treatments',
                'hero_title' => 'Your Health Our Priority',
                'hero_description' => 'From routine check-ups to specialized treatments, we provide quality healthcare in a caring and supportive environment.',
                'hero_cta_label' => 'Book a Consultant',
                'hero_cta_url' => '#',
                'meta_title' => 'Aitken Grove Medical & Aesthetic Center - Quality Healthcare',
                'meta_description' => 'Premier medical and aesthetic treatments with state-of-the-art facilities and expert medical professionals.',
                'published_at' => now()
            ]
        );

        // Check if FirstStep section already exists
        $existingSection = Section::where('page_id', $page->id)
            ->where('key', 'firststep')
            ->first();

        if ($existingSection) {
            $this->info('FirstStep section already exists!');
            $this->line('Position: ' . $existingSection->position);
            $this->line('Visible: ' . ($existingSection->is_visible ? 'Yes' : 'No'));
            return;
        }

        // Create FirstStep section
        $section = Section::create([
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

        $this->success('FirstStep section created successfully!');
        $this->line('Section ID: ' . $section->id);
        $this->line('Position: ' . $section->position);
        $this->line('Key: ' . $section->key);
        
        // Show all current sections
        $this->info('Current sections on home page:');
        $sections = Section::where('page_id', $page->id)->orderBy('position')->get();
        
        foreach ($sections as $sec) {
            $this->line($sec->position . '. ' . $sec->key . ' - ' . $sec->heading . ' (' . ($sec->is_visible ? 'visible' : 'hidden') . ')');
        }
    }
}
