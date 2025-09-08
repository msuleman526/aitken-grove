<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            if (!Schema::hasColumn('pages', 'canonical_url')) {
                $table->string('canonical_url')->nullable()->after('meta_description');
            }
            if (!Schema::hasColumn('pages', 'meta_robots')) {
                $table->string('meta_robots')->default('index, follow')->after('canonical_url');
            }
        });
    }

    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            if (Schema::hasColumn('pages', 'canonical_url')) {
                $table->dropColumn('canonical_url');
            }
            if (Schema::hasColumn('pages', 'meta_robots')) {
                $table->dropColumn('meta_robots');
            }
        });
    }
};
