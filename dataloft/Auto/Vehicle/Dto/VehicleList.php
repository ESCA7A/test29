<?php

namespace Dataloft\Auto\Vehicle\Dto;

use Carbon\CarbonImmutable;
use Dataloft\Auto\CarModel\Dto\RequestCarModel;
use Dataloft\User\User\Dto\AuthorizeUser;
use Spatie\LaravelData\Data;

class VehicleList extends Data
{
    public function __construct(
        public readonly int             $id,
        public readonly int             $car_model_id,
        public readonly RequestCarModel $carModel,
        public readonly int             $releaseYear,
        public readonly int             $carMileageKm,
        public readonly string          $color,
        public readonly int             $user_id,
        public readonly AuthorizeUser   $user,
        public readonly CarbonImmutable $created_at,
        public readonly CarbonImmutable $updated_at,
    ) {}
}
