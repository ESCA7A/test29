<?php

namespace Dataloft\User\User\Dto;

use Spatie\LaravelData\Data;

/**
 * @psalm-suppress PossiblyUnusedProperty
 */
final class AuthorizeUser extends Data
{
    /**
     * @param int $userId
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function __construct(
        public readonly int $userId,
    ) {}
}
