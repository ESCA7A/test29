<?php

namespace Dataloft\Auto\Vehicle\Controllers;

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
use Illuminate\Http\JsonResponse;
use Throwable;

class Controller extends BaseController
{
    /**
     */
    public function index(IndexVehicleRequest $request): JsonResponse
    {
        $vehicleResource = cache('vehicle-resource-index');

        if (!$vehicleResource) {
            $vehicleResource = cache('vehicle-resource-index') ?? VehicleResource::collection(
                Vehicle::query()->with('getCarModel.getBrand')->paginate($request->limit)
            );
            cache()->remember(
                'vehicle-resource-index',
                now()->addDay(),
                fn () => $vehicleResource
            );
        }

        return $this->asJson($vehicleResource);
    }

    /**
     * @throws Throwable
     */
    public function create(CreateVehicleRequest $request): JsonResponse
    {
        return $this->asJson(NewVehicle::create(VehicleCreateData::from($request)));
    }

    /**
     * @throws Throwable
     */
    public function update(UpdateVehicleRequest $request): JsonResponse
    {
        return $this->asJson(UpdateVehicle::patch(VehicleUpdateData::from($request)));
    }

    /**
     * @throws Throwable
     */
    public function delete(DeleteVehicleRequest $request): JsonResponse
    {
        return $this->asJson(DeleteVehicle::rm(VehicleDeleteData::from($request)));
    }
}
