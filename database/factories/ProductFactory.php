<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Device;
use App\Models\Product;
use App\Models\Shop;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'imei' => fake()->word(),
            'color' => fake()->word(),
            'status' => fake()->word(),
            'price' => fake()->word(),
            'imei2' => fake()->word(),
            'device_id' => Device::factory(),
            'shop_id' => Shop::factory(),
        ];
    }
}
