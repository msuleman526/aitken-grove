<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupServices extends Command
{
    protected $signature = 'setup:services';
    protected $description = 'Run migrations and seed services data';

    public function handle()
    {
        $this->info('Running migrations...');
        Artisan::call('migrate');
        
        $this->info('Seeding services...');
        Artisan::call('db:seed', ['--class' => 'ServiceSeeder']);
        
        $this->info('Services setup completed successfully!');
        
        return 0;
    }
}
