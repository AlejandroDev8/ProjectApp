<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Level;
use App\Models\Price;
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
            'user_id' => 1,
            'category_id' => Category::all()->random()->id,
            'level_id' => Level::all()->random()->id,
            'price_id' => Price::all()->random()->id,
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'status' => 2,
            'image_path' => $this->faker->image('public/storage/courses/images', 640, 480, null, true),
        ];
    }
}
