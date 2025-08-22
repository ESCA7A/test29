<?php

namespace Dataloft\Auto\Vehicle\Dto;

use Spatie\LaravelData\Data;

class RequestVehicle extends Data
{
    public function __construct(
        public readonly int $limit,
    ) {}
}
