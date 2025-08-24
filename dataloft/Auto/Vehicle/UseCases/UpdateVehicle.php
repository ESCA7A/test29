<?php

namespace Dataloft\Auto\Vehicle\UseCases;

use Dataloft\Auto\Vehicle\Dto\Response\PatchResponse;
use Dataloft\Auto\Vehicle\Dto\VehicleUpdateData;
use Dataloft\Auto\Vehicle\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

final readonly class UpdateVehicle
{
    public static function patch(VehicleUpdateData $data): PatchResponse
    {
        DB::beginTransaction();
        try {
            $isPatched = Vehicle::query()->where('id', $data->id)->update($data->toArray());

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            Log::debug(__('транзакция завершилась ошибкой. error: :error', ['error' => $e->getMessage()]));
            throw $e;
        }

        return PatchResponse::from(['is_patched' => $isPatched]);
    }
}
