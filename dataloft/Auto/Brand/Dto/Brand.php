<?php

namespace Dataloft\Auto\Brand\Dto;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;

final class Brand extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly CarbonImmutable $createdAt,
        public readonly CarbonImmutable $updatedAt,
    ) {}
}
