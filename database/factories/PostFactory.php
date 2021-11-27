<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => 1,
            "category_id" => 1,
            "title" => $this->faker->sentences(),
            "description" => $this->faker->paragraph(),
            "content" => $this->faker->paragraphs(7)
        ];
    }
}
