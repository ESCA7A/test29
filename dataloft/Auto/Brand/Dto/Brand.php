<?php

namespace Dataloft\Auto\Brand\Dto;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;

class Brand extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly CarbonImmutable $created_at,
        public readonly CarbonImmutable $updated_at,
    ) {}
}
