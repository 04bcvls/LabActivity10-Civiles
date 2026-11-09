<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $authors = Author::all();

        // 40 published posts spread across authors
        Post::factory()->count(40)
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        // 10 draft posts spread across authors
        Post::factory()->count(10)->draft()
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        // Hand-seeded Pinned Post for Kagawad Christian Civiles
        $kagawad = Author::where('email', 'kagawad.civiles@bulletin.test')->first();

        Post::create([
            'author_id' => $kagawad->id,
            'title' => 'Purok Civiles Clean-up Drive',
            'category' => 'Announcement',
            'body' => 'All residents of Purok Civiles are invited to join our annual barangay clean-up drive. Let us work together to ensure a clean, safe, and healthy community.',
            'is_published' => true,
            'is_pinned' => true,
            'published_at' => '2026-09-15 08:00:00',
            'views' => 25,
        ]);
    }
}