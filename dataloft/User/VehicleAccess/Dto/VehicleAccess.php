<?php

namespace Dataloft\User\VehicleAccess\Dto;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;

class VehicleAccess extends Data
{
    public function __construct(
        public readonly int $user_id,
        public readonly int $vehicle_id,
        public readonly CarbonImmutable $created_at,
        public readonly CarbonImmutable $updated_at,
    ) {}
}
