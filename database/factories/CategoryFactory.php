<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::first()->id,
            'title' => [
                'ar' => $this->faker->word(),
                'en' => $this->faker->word(),
            ],
            'image' => env('DEFAULT_IMAGE'),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->sentence(),
            'meta_description' => $this->faker->sentence(),
        ];
    }
}
