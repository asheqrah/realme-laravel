<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Gift;
use App\Models\Lottery;

class LotteryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lottery::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'shop_name' => fake()->word(),
            'shop_code' => fake()->word(),
            'area_name' => fake()->word(),
            'customer_name' => fake()->word(),
            'customer_phone' => fake()->word(),
            'imei' => fake()->word(),
            'is_settled' => fake()->boolean(),
            'settled_at' => fake()->dateTime(),
            'gift_id' => Gift::factory(),
        ];
    }
}
