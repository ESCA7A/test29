<?php

namespace Dataloft\Auto\Vehicle\Dto\Response;

use Spatie\LaravelData\Data;

class DeleteResponse extends Data
{
    public function __construct(
        public readonly int $isDeleted,
    ) {}
}
