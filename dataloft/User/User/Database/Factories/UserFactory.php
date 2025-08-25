<?php

namespace Dataloft\User\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Dataloft\User\User\Models\User;

/**
 * @psalm-suppress MissingTemplateParam
 */
final class UserFactory extends Factory
{
    protected $model = User::class;

    protected static ?string $password;

    #[\Override]
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
