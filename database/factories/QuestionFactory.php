<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
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
            'name' => fake()->sentence(),
            'correct_answer' => fake()->randomElement(['true', 'false']),
            'order' => fake()->numberBetween(0, 100),
        ];
    }
}
