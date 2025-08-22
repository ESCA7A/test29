<?php

namespace Dataloft\Auto\Vehicle\Dto;

use Dataloft\Auto\CarModel\Dto\RequestCarModel;
use Dataloft\User\User\Dto\AuthorizeUser;
use Illuminate\Support\Facades\Request;
use Spatie\LaravelData\Data;

class RequestVehicle extends Data
{
    public function __construct(
        public readonly int $limit,
    ) {}
}
