<?php

namespace Dataloft\Auto\Vehicle\Models;

use Dataloft\Auto\CarModel\Models\CarModel;
use Dataloft\Auto\Vehicle\Database\Factories\VehicleFactory;
use Dataloft\User\User\Models\User;
use Dataloft\User\VehicleAccess\Models\VehicleAccess;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vehicle extends Model
{
    use HasFactory;

    public function getCarModel(): BelongsTo
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }

    public function getUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'vehicle_accesses')
            ->using(VehicleAccess::class)
            ->withPivot('id');
    }

    protected static function newFactory(): VehicleFactory
    {
        return VehicleFactory::new();
    }
}
