<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CheckStorage extends Command
{
    protected $signature = 'storage:check';
    protected $description = 'Check storage configuration and fix common issues';

    public function handle()
    {
        $this->info('🔍 Checking Storage Configuration...');
        $this->newLine();

        // Check storage directories
        $this->checkStorageDirectories();
        
        // Check storage link
        $this->checkStorageLink();
        
        // Check file permissions
        $this->checkPermissions();
        
        // Check disk configuration
        $this->checkDiskConfiguration();
        
        // Check uploaded files
        $this->checkUploadedFiles();
        
        $this->newLine();
        $this->info('✅ Storage check completed!');
        
        return 0;
    }
    
    private function checkStorageDirectories()
    {
        $this->info('📁 Checking storage directories...');
        
        $directories = [
            storage_path('app/public'),
            storage_path('app/public/caring-images'),
            public_path('storage'),
        ];
        
        foreach ($directories as $dir) {
            if (File::exists($dir)) {
                $this->line("  ✅ {$dir} exists");
            } else {
                $this->error("  ❌ {$dir} missing");
                if (str_contains($dir, 'caring-images')) {
                    File::makeDirectory($dir, 0755, true);
                    $this->info("  🔧 Created {$dir}");
                }
            }
        }
    }
    
    private function checkStorageLink()
    {
        $this->info('🔗 Checking storage link...');
        
        $publicStorage = public_path('storage');
        $storageApp = storage_path('app/public');
        
        if (File::exists($publicStorage)) {
            if (is_link($publicStorage)) {
                $target = readlink($publicStorage);
                if (str_contains($target, 'app/public') || str_contains($target, 'app\\public')) {
                    $this->line('  ✅ Storage link exists and points to correct location');
                } else {
                    $this->error('  ❌ Storage link points to wrong location: ' . $target);
                }
            } else {
                $this->warn('  ⚠️ public/storage exists but is not a symbolic link');
            }
        } else {
            $this->error('  ❌ Storage link missing');
            $this->info('  🔧 Creating storage link...');
            $this->call('storage:link');
        }
    }
    
    private function checkPermissions()
    {
        $this->info('🔒 Checking file permissions...');
        
        $paths = [
            storage_path('app/public'),
            storage_path('app/public/caring-images'),
        ];
        
        foreach ($paths as $path) {
            if (File::exists($path)) {
                $perms = substr(sprintf('%o', fileperms($path)), -4);
                if ($perms >= '0755') {
                    $this->line("  ✅ {$path} permissions: {$perms}");
                } else {
                    $this->warn("  ⚠️ {$path} permissions: {$perms} (may need 755)");
                }
            }
        }
    }
    
    private function checkDiskConfiguration()
    {
        $this->info('💾 Checking disk configuration...');
        
        try {
            $disk = Storage::disk('public');
            $root = $disk->path('');
            $url = $disk->url('');
            
            $this->line("  ✅ Public disk root: {$root}");
            $this->line("  ✅ Public disk URL: {$url}");
            
            // Test disk write
            $testFile = 'test-' . time() . '.txt';
            $disk->put($testFile, 'Storage test file');
            
            if ($disk->exists($testFile)) {
                $this->line('  ✅ Disk write test successful');
                $disk->delete($testFile);
            } else {
                $this->error('  ❌ Disk write test failed');
            }
            
        } catch (\Exception $e) {
            $this->error('  ❌ Disk configuration error: ' . $e->getMessage());
        }
    }
    
    private function checkUploadedFiles()
    {
        $this->info('📸 Checking uploaded files...');
        
        try {
            $disk = Storage::disk('public');
            
            if ($disk->exists('caring-images')) {
                $files = $disk->files('caring-images');
                $this->line("  ✅ Found " . count($files) . " files in caring-images:");
                
                foreach ($files as $file) {
                    $size = $disk->size($file);
                    $this->line("    - {$file} ({$size} bytes)");
                }
            } else {
                $this->warn('  ⚠️ No caring-images directory found');
            }
            
        } catch (\Exception $e) {
            $this->error('  ❌ Error checking files: ' . $e->getMessage());
        }
    }
}
