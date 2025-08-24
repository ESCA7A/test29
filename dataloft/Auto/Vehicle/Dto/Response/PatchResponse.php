<?php

namespace Dataloft\Auto\Vehicle\Dto\Response;

use Spatie\LaravelData\Data;

final class PatchResponse extends Data
{
    public function __construct(
        public readonly int $isPatched,
    ) {}
}
