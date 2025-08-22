<?php

namespace Dataloft\Auto\CarModel\Dto;

use Dataloft\Auto\Brand\Dto\RequestBrand;
use Spatie\LaravelData\Data;

class RequestCarModel extends Data
{
    public function __construct(
        public readonly string $title,
        public readonly RequestBrand $brand,
    ) {}
}
