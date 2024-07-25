<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;


class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define data to be seeded
        $pages = [
            [
                'name' => 'HOME',
                'slug' => '/',
                'tempname' => 'templates.basic.',
                'secs' => '["client","about","feature","plan","counter","faq","testimonial","blog"]',
                'is_default' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blog',
                'slug' => 'blog',
                'tempname' => 'templates.basic.',
                'secs' => null,
                'is_default' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Contact',
                'slug' => 'contact',
                'tempname' => 'templates.basic.',
                'secs' => null,
                'is_default' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'About',
                'slug' => 'about',
                'tempname' => 'templates.basic.',
                'secs' => '["about"]',
                'is_default' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data into the pages table
        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
