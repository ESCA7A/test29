<?php

namespace Dataloft\Auto\CarModel\Models;

use Dataloft\Auto\Brand\Models\Brand;
use Dataloft\Auto\CarModel\Database\Factories\CarModelFactory;
use Dataloft\Auto\Vehicle\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarModel extends Model
{
    use HasFactory;

    public function getBrand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function getVehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

    protected static function newFactory(): CarModelFactory
    {
        return CarModelFactory::new();
    }
}
