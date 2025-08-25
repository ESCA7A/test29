<?php

namespace Dataloft\Auto\CarModel\Models;

use Dataloft\Auto\Brand\Models\Brand;
use Dataloft\Auto\CarModel\Database\Factories\CarModelFactory;
use Dataloft\Auto\Vehicle\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static inRandomOrder(): CarModel
 * @property int $id
 * @property string $title
 * @property int $brand_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Dataloft\Auto\CarModel\Database\Factories\CarModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarModel whereUpdatedAt($value)
 * @mixin \Eloquent
 * @psalm-suppress MissingTemplateParam
 */
final class CarModel extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     * @psalm-api
     */
    public function getBrand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    /**
     * @return HasMany
     * @psalm-api
     */
    public function getVehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

    protected static function newFactory(): CarModelFactory
    {
        return CarModelFactory::new();
    }
}
