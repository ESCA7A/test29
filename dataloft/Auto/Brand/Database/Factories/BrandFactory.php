<?php

namespace Dataloft\Auto\Brand\Database\Factories;

use Dataloft\Auto\Brand\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

final class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition(): array
    {
        return [
            'title' => "brand_{$this->faker->word}"
        ];
    }
}
