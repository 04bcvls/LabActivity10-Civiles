<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hand-seeded Kagawad
        Author::create([
            'name' => 'Kagawad Christian Civiles',
            'position' => 'Kagawad',
            'email' => 'kagawad.civiles@bulletin.test',
        ]);

        // 4 factory authors (Total = 5 authors)
        Author::factory()->count(4)->create();
    }
}