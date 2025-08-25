<?php

namespace Dataloft\User\VehicleAccess\Models;

use Dataloft\User\User\Models\User;
use Dataloft\User\VehicleAccess\Database\Factories\VehicleAccessFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property int $id
 * @property int $user_id
 * @property int $vehicle_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Dataloft\User\VehicleAccess\Database\Factories\VehicleAccessFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleAccess newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleAccess newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleAccess query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleAccess whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleAccess whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleAccess whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleAccess whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleAccess whereVehicleId($value)
 * @mixin \Eloquent
 */
class VehicleAccess extends Pivot
{
    use HasFactory;

    protected $table = 'vehicle_accesses';

    public function getUser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory(): VehicleAccessFactory
    {
        return VehicleAccessFactory::new();
    }
}
