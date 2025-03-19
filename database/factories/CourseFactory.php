<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->firstName(),
            'AliceName' => fake()->lastname(),
            'description'=>fake()->text(),
            'price'=>fake()->numberBetween(20, 500),
            'Image'=>fake()->image(),
            'teacher_id' => Teacher::inRandomOrder()->first()->id ?? Teacher::create(),


        ];
    }
}
