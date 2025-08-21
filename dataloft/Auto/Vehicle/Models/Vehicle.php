<?php

namespace Dataloft\Auto\Vehicle\Models;

use Dataloft\Auto\CarModel\Models\CarModel;
use Dataloft\Auto\Vehicle\Database\Factories\VehicleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;

    public function getCarModels(): hasMany
    {
        return $this->hasMany(CarModel::class);
    }

    protected static function newFactory(): VehicleFactory
    {
        return VehicleFactory::new();
    }
}
