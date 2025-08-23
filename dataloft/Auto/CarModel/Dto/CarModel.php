<?php

namespace Dataloft\Auto\CarModel\Dto;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;

class CarModel extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly int $brandId,
        public readonly CarbonImmutable $createdAt,
        public readonly CarbonImmutable $updatedAt,
    ) {}
}
