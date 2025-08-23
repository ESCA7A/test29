<?php

namespace Dataloft\Auto\Vehicle\Dto;

use Spatie\LaravelData\Data;

class VehicleDeleteData extends Data
{
    public function __construct(
        public readonly int $id,
    ) {}
}
