<?php

namespace Dataloft\User\VehicleAccess\Models;

use Dataloft\Auto\Vehicle\Models\Vehicle;
use Dataloft\User\User\Models\User;
use Dataloft\User\VehicleAccess\Database\Factories\VehicleAccessFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

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
