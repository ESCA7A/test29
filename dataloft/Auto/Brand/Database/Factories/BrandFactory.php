<?php

namespace Dataloft\Auto\Brand\Database\Factories;

use Dataloft\Auto\Brand\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition()
    {
        return [
            'title' => "brand_{$this->faker->word}"
        ];
    }
}
