<?php

namespace Dataloft\Auto\Vehicle\Dto;

use Illuminate\Support\Carbon;
use Spatie\LaravelData\Data;

final class VehicleData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly int $carModelId,
        public readonly Carbon $createdAt,
        public readonly Carbon $updatedAt,
        public readonly ?string $releaseYear = null,
        public readonly ?int $carMileageKm = null,
        public readonly ?string $color = null,
    ) {}
}
