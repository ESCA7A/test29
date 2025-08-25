<?php

namespace Dataloft\Auto\Vehicle\Dto;

use Spatie\LaravelData\Data;

/**
 * @psalm-suppress PossiblyUnusedProperty
 */
final class VehicleCreateData extends Data
{
    /**
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function __construct(
        public readonly int $carModelId,
        public readonly ?string $releaseYear = null,
        public readonly ?int $carMileageKm = null,
        public readonly ?string $color = null,
    ) {}
}
