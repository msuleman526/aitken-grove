<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Database\Seeders\LandingPageSeeder;

class SeedLandingPage extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'landing:seed {--force : Force seed even if data exists}';

    /**
     * The console command description.
     */
    protected $description = 'Seed the landing page with default Trust section and content';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Seeding landing page with Trust section...');
        
        $seeder = new LandingPageSeeder();
        $seeder->run();
        
        $this->info('✅ Landing page seeded successfully!');
        $this->info('The Trust section is now available on your home page.');
        $this->info('You can edit it through Filament Admin > Sections > Trust Section');
        
        return Command::SUCCESS;
    }
}
