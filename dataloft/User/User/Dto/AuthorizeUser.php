<?php

namespace Dataloft\User\User\Dto;

use Spatie\LaravelData\Data;

/**
 * @property int $id
 */
class AuthorizeUser extends Data
{
    public function __construct(
        public readonly int $id,
    ) {}
}
