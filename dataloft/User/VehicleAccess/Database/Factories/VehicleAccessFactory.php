<?php

namespace Dataloft\User\VehicleAccess\Database\Factories;

use Dataloft\Auto\Vehicle\Models\Vehicle;
use Dataloft\User\User\Models\User;
use Dataloft\User\VehicleAccess\Models\VehicleAccess;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleAccessFactory extends Factory
{
    protected $model = VehicleAccess::class;

    #[\Override]
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'vehicle_id' => Vehicle::inRandomOrder()->first()->id,
        ];
    }
}
