<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'unit_id' => Unit::factory()->create()->id,
            'supplier_id' => Supplier::factory()->create()->id,
            'product_category_id' => ProductCategory::factory()->create()->id,
            'quantity' => $this->faker->numberBetween(1, 100),
            'created_by' => 1, // Adjust this according to your needs
            'created_at' => Carbon::now(),
        ];
    }
}