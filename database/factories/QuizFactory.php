<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text_content' => $this->faker->paragraph(),
            'correct_choice' => $this->faker->sentence(),
            'w_choice_1' => $this->faker->sentence(),
            'w_choice_2' => $this->faker->sentence(),
        ];
    }
}
