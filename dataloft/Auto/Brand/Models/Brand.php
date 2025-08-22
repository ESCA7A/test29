<?php

namespace Dataloft\Auto\Brand\Models;

use Dataloft\Auto\Brand\Database\Factories\BrandFactory;
use Dataloft\Auto\CarModel\Models\CarModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    public function getCarModels(): HasMany
    {
        return $this->hasMany(CarModel::class);
    }

    protected static function newFactory(): BrandFactory
    {
        return BrandFactory::new();
    }
}
