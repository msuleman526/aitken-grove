<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            // Hero text content
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            
            // Statistics boxes
            $table->json('hero_stats')->nullable(); // For the three boxes (Tests, Doctors, Patients)
            
            // Opening hours
            $table->string('opening_hours')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn([
                'hero_title',
                'hero_description', 
                'hero_stats',
                'opening_hours',
                'contact_phone',
                'contact_email'
            ]);
        });
    }
};
