<?php

namespace Database\Factories;

use App\Models\Poll;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poll>
 */
class PollFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'creator_id' => 1,
            'name' => fake()->word(),
            'status' => Poll::PUBLISHED,
            'slug' => fake()->slug(),
            'published_at' => now(),
            'views' => fake()->numberBetween(0, 100),
        ];
    }
}
