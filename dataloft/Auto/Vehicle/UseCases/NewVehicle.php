<?php

namespace Dataloft\Auto\Vehicle\UseCases;

use Dataloft\Auto\Vehicle\Dto\VehicleCreateData as CreateData;
use Dataloft\Auto\Vehicle\Dto\VehicleData;
use Dataloft\Auto\Vehicle\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

readonly class NewVehicle
{
    public static function create(CreateData $data): VehicleData
    {
        DB::beginTransaction();
        try {
            $newVehicle = VehicleData::from(Vehicle::create($data->toArray()));
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            Log::debug(__('транзакция завершилась ошибкой. error: :error', ['error' => $e->getMessage()]));
            throw $e;
        }

        return $newVehicle;
    }
}
