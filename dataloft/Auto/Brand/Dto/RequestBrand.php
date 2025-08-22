<?php

namespace Dataloft\Auto\Brand\Dto;

use Spatie\LaravelData\Data;

class RequestBrand extends Data
{
    public function __construct(
        public readonly string $title,
    ) {}
}
