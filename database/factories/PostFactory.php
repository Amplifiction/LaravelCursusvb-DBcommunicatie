<?php

namespace Database\Factories;

//DEZE FACTORY WERD GEMAAKT MET php artisan make:factory PostFactory

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //deze variabelen op voorhand declareren omdat de inhoud van de return array in 1x wordt bewaard. Dus kan url nog niet voortbouwen op title.
        $title = $this->faker->sentence(rand(4,8));
        $slug = Str::slug($title).'-'.$this->faker->uuid(); //Universally Unique Identifier. It's a 36-character alphanumeric string.

        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence(rand(3,6)),
            'url' => $slug,
            'published' => $this->faker->boolean(),
            'status' => $this->faker->randomElement(['draft', 'final']), // OF $this->faker->boolean()? 'draft' : 'final',
            'content' => $this->faker->paragraph(rand(2,8))
        ];
    }
}
