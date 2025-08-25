<?php

namespace Dataloft\User\User\Controllers;

use Dataloft\Application\Cache\UseCases\CacheKeyFromUri;
use Dataloft\Application\Routing\Controllers\BaseController;
use Dataloft\User\User\Requests\ShowVehicleRequest;
use Dataloft\User\User\Resources\UserResource;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

final class Controller extends BaseController
{
    /**
     * @throws Exception
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function index(ShowVehicleRequest $request): JsonResponse
    {
        $resource = cache((new CacheKeyFromUri($request))->fromUri());

        if (!$resource) {
            $resource = Cache::remember(
                $resource, now()->addDay(),
                fn () => new UserResource($request->user()->load('getVehicles'))
            );
        }

        return $this->asJson($resource);
    }
}
