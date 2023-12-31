<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'title' => fake()->title(),
            'description' => fake()->paragraphs(3, true),
            'status' => fake()->randomElement(['open', 'closed']),
            'views' => fake()->numberBetween(0, 100),
            'user_id' => fake()->numberBetween(1, 5),
        ];
    }
}
