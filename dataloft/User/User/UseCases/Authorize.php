<?php

namespace Dataloft\User\User\UseCases;

use Dataloft\User\User\Dto\AuthorizeUser;
use Dataloft\User\User\Models\User;
use Illuminate\Support\Facades\Auth;

class Authorize
{
    public static function as(AuthorizeUser $user): void
    {
        Auth::setUser(User::find($user->userId));
    }
}
