<?php

namespace Dataloft\Auto\Vehicle\Dto;

use Spatie\LaravelData\Data;

final class VehicleUpdateData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $releaseYear,
        public readonly ?int $carMileageKm,
        public readonly ?string $color,
    ) {}
}
