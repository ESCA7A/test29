<?php

namespace Dataloft\Auto\Vehicle\Controllers;

use Dataloft\Auto\Vehicle\Dto\VehicleCreateData;
use Dataloft\Auto\Vehicle\Dto\VehicleData;
use Dataloft\Auto\Vehicle\Dto\VehicleUpdateData;
use Dataloft\Auto\Vehicle\Models\Vehicle;
use Dataloft\Auto\Vehicle\Requests\CreateVehicleRequest;
use Dataloft\Auto\Vehicle\Requests\IndexVehicleRequest;
use Dataloft\Auto\Vehicle\Requests\UpdateVehicleRequest;
use Dataloft\Auto\Vehicle\Resources\VehicleResource;
use App\Http\Controllers\Controller as BaseController;
use Dataloft\Auto\Vehicle\UseCases\NewVehicle;
use Dataloft\Auto\Vehicle\UseCases\UpdateVehicle;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Throwable;

class Controller extends BaseController
{
    /**
     */
    public function index(IndexVehicleRequest $request): AnonymousResourceCollection
    {
        $vehicleResource = cache('vehicle-resource-index');

        if (!$vehicleResource) {
            $vehicleResource = cache('vehicle-resource-index') ?? VehicleResource::collection(
                Vehicle::query()->with('getCarModel.getBrand')->paginate($request->limit)
            );
            cache()->add('vehicle-resource-index', $vehicleResource);
        }

        return $vehicleResource;
    }

    /**
     * @throws Throwable
     */
    public function create(CreateVehicleRequest $request): ?VehicleData
    {
        return NewVehicle::create(VehicleCreateData::from($request));
    }

    /**
     * @throws Throwable
     */
    public function update(UpdateVehicleRequest $request): true
    {
        return UpdateVehicle::patch(VehicleUpdateData::from($request));
    }

    public function delete()
    {
    }
}
