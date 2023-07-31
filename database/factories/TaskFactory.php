<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // you can either use functions or properties. Properties would just use default functions, lets you specify some options if you'd like to customize
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            // how many sentences to make => 7
            'long-description' => fake()->paragraph(7, true),
            'complete' => fake()->boolean
        ];
    }
}