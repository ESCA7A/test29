<?php

namespace Dataloft\Auto\Vehicle\Dto\Response;

use Spatie\LaravelData\Data;

/**
 * @psalm-suppress PossiblyUnusedProperty
 */
final class DeleteResponse extends Data
{
    /**
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function __construct(
        public readonly int $isDeleted,
    ) {}
}
