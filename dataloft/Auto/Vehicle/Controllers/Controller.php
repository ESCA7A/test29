<?php

namespace Dataloft\Auto\Vehicle\Controllers;

use Dataloft\Application\Cache\UseCases\CacheKeyFromUri;
use Dataloft\Application\Routing\Controllers\BaseController;
use Dataloft\Auto\Vehicle\Dto\VehicleCreateData;
use Dataloft\Auto\Vehicle\Dto\VehicleDeleteData;
use Dataloft\Auto\Vehicle\Dto\VehicleUpdateData;
use Dataloft\Auto\Vehicle\Models\Vehicle;
use Dataloft\Auto\Vehicle\Requests\CreateVehicleRequest;
use Dataloft\Auto\Vehicle\Requests\DeleteVehicleRequest;
use Dataloft\Auto\Vehicle\Requests\IndexVehicleRequest;
use Dataloft\Auto\Vehicle\Requests\UpdateVehicleRequest;
use Dataloft\Auto\Vehicle\Resources\VehicleResource;
use Dataloft\Auto\Vehicle\UseCases\DeleteVehicle;
use Dataloft\Auto\Vehicle\UseCases\NewVehicle;
use Dataloft\Auto\Vehicle\UseCases\UpdateVehicle;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Throwable;

final class Controller extends BaseController
{
    /**
     * @throws Exception
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function index(IndexVehicleRequest $request): JsonResponse
    {
        $resource = cache((new CacheKeyFromUri($request))->fromUri());
        if (!$resource) {
            $resource = Cache::remember($resource, now()->addDay(), fn () => VehicleResource::collection(
                Vehicle::query()->with('getCarModel.getBrand')->paginate($request->limit)
            ));
        }

        return $this->asJson($resource);
    }

    /**
     * @throws Throwable
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function create(CreateVehicleRequest $request): JsonResponse
    {
        return $this->asJson(NewVehicle::create(VehicleCreateData::from($request)));
    }

    /**
     * @throws Throwable
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function update(UpdateVehicleRequest $request): JsonResponse
    {
        return $this->asJson(UpdateVehicle::patch(VehicleUpdateData::from($request)));
    }

    /**
     * @throws Throwable
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function delete(DeleteVehicleRequest $request): JsonResponse
    {
        return $this->asJson(DeleteVehicle::rm(VehicleDeleteData::from($request)));
    }
}
