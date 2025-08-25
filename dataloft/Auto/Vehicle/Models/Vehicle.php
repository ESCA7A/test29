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

/**
 * @property int $id
 * @property int $car_model_id
 * @property string|null $release_year Год выпуска
 * @property int|null $car_mileage_km Пробег в километрах
 * @property string|null $color Цвет
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Dataloft\Auto\Vehicle\Database\Factories\VehicleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereCarMileageKm($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereCarModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereReleaseYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Vehicle extends Model
{
    use HasFactory;

    protected $guarded = [];

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
