<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Unit::class;

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