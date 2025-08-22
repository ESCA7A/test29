<?php

namespace Dataloft\Auto\Vehicle\UseCases;

use Dataloft\Auto\Vehicle\Dto\RequestVehicle;
use Dataloft\Auto\Vehicle\Dto\VehicleList as VehicleListData;
use Dataloft\Auto\Vehicle\Models\Vehicle;
use Illuminate\Support\Facades\DB;

class VehicleList
{
    public static function get(RequestVehicle $data)
    {
        $vehicleListData = VehicleListData::class;

        $vehicleTableName = (new Vehicle)->getTable();

        $vehiclePaginator = DB::table($vehicleTableName)->paginate($data->limit);
    }
}
