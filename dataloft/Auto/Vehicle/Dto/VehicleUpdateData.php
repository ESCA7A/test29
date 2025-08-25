<?php

namespace Dataloft\Auto\Vehicle\Dto;

use Spatie\LaravelData\Data;

/**
 * @psalm-suppress PossiblyUnusedProperty
 */
final class VehicleUpdateData extends Data
{
    /**
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function __construct(
        public readonly int $id,
        public readonly ?string $releaseYear,
        public readonly ?int $carMileageKm,
        public readonly ?string $color,
    ) {}
}
