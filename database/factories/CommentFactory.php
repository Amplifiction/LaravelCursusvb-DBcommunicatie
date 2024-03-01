<?php

namespace Database\Factories;

//GEMAAKT MET php artisan make:factory CommentFactory

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->paragraph((rand(1,4))),
            'name' => $this->faker->name()
        ];
    }
}
