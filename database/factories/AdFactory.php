<?php

namespace Database\Factories;

use App\Models\Ad;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ad::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'body' => $this->faker->text(),
            'offer' => $this->faker->text(255),
            'product_id' => \App\Models\Product::factory(),
        ];
    }
}
