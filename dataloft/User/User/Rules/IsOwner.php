<?php

namespace Dataloft\User\User\Rules;

use Closure;
use Dataloft\Auto\Vehicle\Models\Vehicle;
use Dataloft\User\VehicleAccess\Models\VehicleAccess;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class IsOwner implements ValidationRule, DataAwareRule
{
    protected array $data = [];

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $vehicleTable = (new Vehicle)->getTable();
        $vehicleAccessTable = (new VehicleAccess())->getTable();

        $isOwner = DB::table($vehicleTable)
            ->join($vehicleAccessTable, "{$vehicleTable}.id", '=', "{$vehicleAccessTable}.vehicle_id")
            ->where("{$vehicleAccessTable}.user_id", $this->data['user_id'])
            ->where("{$vehicleTable}.id", $value)
            ->select("{$vehicleTable}.id")
            ->count();

        if (!$isOwner) {
            $fail(__('Пользователь не является владельцем транпорта'));
        }
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }
}
