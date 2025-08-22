<?php

namespace Dataloft\User\VehicleAccess\Dto;

use Dataloft\Auto\Vehicle\Dto\Vehicle;
use Dataloft\User\User\Dto\User;
use Spatie\LaravelData\Data;

class RequestVehicleAccess extends Data
{
    public function __construct(
        public readonly User $user,
        public readonly Vehicle $vehicle,
    ) {}
}
