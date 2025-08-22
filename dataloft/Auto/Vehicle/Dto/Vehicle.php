<?php

namespace Dataloft\Auto\Vehicle\Dto;

use Carbon\CarbonImmutable;
use Dataloft\User\User\Dto\User;
use Spatie\LaravelData\Data;

class Vehicle extends Data
{
    public function __construct(
        public readonly int             $id,
        public readonly int             $car_model_id,
        public readonly int             $release_year,
        public readonly int             $car_mileage_km,
        public readonly string          $color,
        public readonly int|User        $user_id,
        public readonly CarbonImmutable $created_at,
        public readonly CarbonImmutable $updated_at,
    ) {}
}
