<?php

namespace Dataloft\Auto\Vehicle\Dto;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class VehicleCreate extends Data
{
    public function __construct(
        public readonly int $carModelId,
        public readonly CarbonImmutable $releaseYear,
        public readonly int $carMileageKm,
        public readonly string $color,
    ) {}
}
