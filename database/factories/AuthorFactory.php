<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'position' => fake()->randomElement(['Barangay Secretary', 'BHW', 'Tanod', 'Kagawad']),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}