<?php

namespace Dataloft\User\User\Dto;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property CarbonImmutable $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property CarbonImmutable $created_at
 * @property CarbonImmutable $updated_at
 */
class User extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly CarbonImmutable $email_verified_at,
        public readonly string $password,
        public readonly string $remember_token,
        public readonly CarbonImmutable $created_at,
        public readonly CarbonImmutable $updated_at,
    ) {}
}
