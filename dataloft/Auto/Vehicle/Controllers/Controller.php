<?php

namespace Dataloft\Auto\Vehicle\Controllers;

use Dataloft\Auto\Vehicle\Models\Vehicle;
use Dataloft\Auto\Vehicle\Requests\IndexVehicleRequest;
use Dataloft\Auto\Vehicle\Resources\VehicleResource;
use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    public function index(IndexVehicleRequest $request)
    {
        return VehicleResource::collection(
            Vehicle::query()->with('getCarModel.getBrand')->paginate($request->limit)
        );
    }
}
