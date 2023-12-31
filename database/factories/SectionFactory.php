<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'text_content' => $this->faker->sentence(),
            'code_example' => $this->faker->sentence(),
            'link' => 'github.com/'.(fake()->userName),
            'img'=> 'github.com/'.(fake()->userName)
        ];
    }
}
