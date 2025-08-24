<?php

namespace Dataloft\Auto\Vehicle\UseCases;

use Dataloft\Auto\Vehicle\Dto\Response\DeleteResponse;
use Dataloft\Auto\Vehicle\Dto\VehicleDeleteData;
use Dataloft\Auto\Vehicle\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

final readonly class DeleteVehicle
{
    public static function rm(VehicleDeleteData $data): DeleteResponse
    {
        DB::beginTransaction();
        try {
            $delete = Vehicle::query()->where('id', $data->id)->delete();
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            Log::debug(__('транзакция завершилась ошибкой. error: :error', ['error' => $e->getMessage()]));
            throw $e;
        }

        return DeleteResponse::from(['is_deleted' => $delete]);
    }
}
