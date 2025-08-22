<?php

namespace Dataloft\Auto\CarModel\Dto;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;

class CarModel extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly int $brand_id,
        public readonly CarbonImmutable $created_at,
        public readonly CarbonImmutable $updated_at,
    ) {}
}
