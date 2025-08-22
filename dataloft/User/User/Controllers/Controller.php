<?php

namespace Dataloft\User\User\Controllers;

use Dataloft\User\User\Requests\ShowVehicleRequest;
use Dataloft\User\User\Resources\UserResource;
use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    public function index(ShowVehicleRequest $request): UserResource
    {
        return new UserResource($request->user()->load('getVehicles'));
    }
}
