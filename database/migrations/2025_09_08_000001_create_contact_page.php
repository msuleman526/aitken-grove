<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Contact page will be created via seeder, this migration ensures tables exist
        if (!Schema::hasTable('pages')) {
            Schema::create('pages', function (Blueprint $table) {
                $table->id();
                $table->string('slug')->unique();
                $table->string('title');
                $table->string('subtitle')->nullable();
                $table->string('hero_cta_label')->nullable();
                $table->string('hero_cta_url')->nullable();
                $table->string('hero_title')->nullable();
                $table->text('hero_description')->nullable();
                $table->json('hero_stats')->nullable();
                $table->string('opening_hours')->nullable();
                $table->string('contact_phone')->nullable();
                $table->string('contact_email')->nullable();
                $table->string('meta_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->json('open_graph_json')->nullable();
                $table->timestamp('published_at')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('sections')) {
            Schema::create('sections', function (Blueprint $table) {
                $table->id();
                $table->foreignId('page_id')->constrained()->onDelete('cascade');
                $table->string('key');
                $table->string('heading')->nullable();
                $table->string('subheading')->nullable();
                $table->json('content_json')->nullable();
                $table->integer('position')->default(0);
                $table->boolean('is_visible')->default(true);
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        // Don't drop existing tables
    }
};
