<?php

namespace Dataloft\Auto\Vehicle\Controllers;

use Dataloft\Auto\Vehicle\Models\Vehicle;
use Dataloft\Auto\Vehicle\Requests\IndexVehicleRequest;
use Dataloft\Auto\Vehicle\Resources\VehicleResource;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class Controller extends BaseController
{
    public function index(IndexVehicleRequest $request): AnonymousResourceCollection
    {
        return VehicleResource::collection(
            Vehicle::query()->with('getCarModel.getBrand')->paginate($request->limit)
        );
    }

    public function create()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
