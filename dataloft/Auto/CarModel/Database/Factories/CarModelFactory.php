<?php

namespace Dataloft\Auto\CarModel\Database\Factories;

use Dataloft\Auto\Brand\database\Factories\BrandFactory;
use Dataloft\Auto\Brand\Models\Brand;
use Dataloft\Auto\CarModel\Models\CarModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BrandFactory>
 */
class CarModelFactory extends Factory
{
    protected $model = CarModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => "car_model_{$this->faker->word()}",
            'brand_id' => Brand::inRandomOrder()->first()->id,
        ];
    }
}
