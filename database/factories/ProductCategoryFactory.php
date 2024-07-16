<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProductCategory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'status' => $this->faker->randomElement([0, 1]), // Example of random status
            'created_by' => 1, // Adjust this according to your needs
            'created_at' => Carbon::now(),
        ];
    }
}