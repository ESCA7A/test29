<?php

namespace Dataloft\Auto\Vehicle\Dto\Response;

use Psalm\Issue\PossiblyUnusedProperty;
use Spatie\LaravelData\Data;

/**
 * @psalm-suppress PossiblyUnusedProperty
 */
final class PatchResponse extends Data
{
    /**
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function __construct(
        /** @psalm-assert PossiblyUnusedProperty */
        public readonly int $isPatched,
    ) {}
}
