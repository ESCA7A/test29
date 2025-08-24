<?php

namespace Dataloft\User\User\Controllers;

use Dataloft\Application\Routing\Controllers\BaseController;
use Dataloft\User\User\Requests\ShowVehicleRequest;
use Dataloft\User\User\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class Controller extends BaseController
{
    public function index(ShowVehicleRequest $request): JsonResponse
    {
        return $this->asJson(new UserResource($request->user()->load('getVehicles')));
    }
}
