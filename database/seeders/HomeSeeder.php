<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Home;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Home::firstOrCreate(
            ['id' => 1],
            [
                'title' => 'Welcome to Our Website',
                'cover_image' => null,
            ]
        );
    }
}
