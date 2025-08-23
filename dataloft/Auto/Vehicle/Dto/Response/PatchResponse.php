<?php

namespace Dataloft\Auto\Vehicle\Dto\Response;

use Spatie\LaravelData\Data;

class PatchResponse extends Data
{
    public function __construct(
        public readonly int $isPatched,
    ) {}
}
