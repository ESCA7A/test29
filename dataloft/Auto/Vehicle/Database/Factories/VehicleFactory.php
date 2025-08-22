<?php

namespace Dataloft\Auto\Vehicle\Database\Factories;

use Dataloft\Auto\CarModel\Models\CarModel;
use Dataloft\Auto\Vehicle\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VehicleFactory>
 */
class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'car_model_id' => CarModel::inRandomOrder()->first()->id,
            'release_year' => $this->faker->date,
            'car_mileage_km' => $this->faker->numberBetween(),
            'color' => $this->faker->hexColor,
        ];
    }
}
