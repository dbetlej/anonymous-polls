<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resolved>
 */
class ResolvedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'poll_id' => 1,
            'access_key' => fake()->uuid(),
            'score' => fake()->numberBetween(0, 100),
            'started_at' => now(),
            'ended_at' => Carbon::now()->addHours(2),
        ];
    }
}
