<?php

namespace Dataloft\User\User\Dto;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

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
#[MapInputName(SnakeCaseMapper::class)]
class User extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly CarbonImmutable $emailVerifiedAt,
        public readonly string $password,
        public readonly string $rememberToken,
        public readonly CarbonImmutable $createdAt,
        public readonly CarbonImmutable $updatedAt,
    ) {}
}
