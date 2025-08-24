<?php

namespace Dataloft\Auto\Vehicle\Dto;

use Spatie\LaravelData\Data;

final class VehicleDeleteData extends Data
{
    public function __construct(
        public readonly int $id,
    ) {}
}
