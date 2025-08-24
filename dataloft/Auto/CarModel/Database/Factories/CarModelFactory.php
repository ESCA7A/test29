<?php

namespace Dataloft\Auto\CarModel\Database\Factories;

use Dataloft\Auto\Brand\Models\Brand;
use Dataloft\Auto\CarModel\Models\CarModel;
use Illuminate\Database\Eloquent\Factories\Factory;

final class CarModelFactory extends Factory
{
    protected $model = CarModel::class;

    public function definition(): array
    {
        return [
            'title' => "car_model_{$this->faker->word()}",
            'brand_id' => Brand::inRandomOrder()->first()->id,
        ];
    }
}
