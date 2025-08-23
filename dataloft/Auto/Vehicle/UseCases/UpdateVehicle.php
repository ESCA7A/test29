<?php

namespace Dataloft\Auto\Vehicle\UseCases;

use Dataloft\Auto\Vehicle\Dto\VehicleUpdateData;
use Dataloft\Auto\Vehicle\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

readonly class UpdateVehicle
{
    public static function patch(VehicleUpdateData $data): true
    {
        DB::beginTransaction();
        try {
            $vehicleUpdated = Vehicle::query()->where('id', $data->id)->update($data->toArray());

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            Log::debug(__('транзакция завершилась ошибкой. error: :error', ['error' => $e->getMessage()]));
            throw $e;
        }

        return $vehicleUpdated;
    }
}
