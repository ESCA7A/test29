<?php

namespace Dataloft\Auto\CarModel\Models;

use Dataloft\Auto\Brand\Models\Brand;
use Dataloft\Auto\CarModel\Database\Factories\CarModelFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CarModel extends Model
{
    use HasFactory;

    public function getBrand(): HasOne
    {
        return $this->hasOne(Brand::class);
    }

    protected static function newFactory(): CarModelFactory
    {
        return CarModelFactory::new();
    }
}
