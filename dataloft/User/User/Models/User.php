<?php

namespace Dataloft\User\User\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Dataloft\Auto\Vehicle\Models\Vehicle;
use Dataloft\User\User\Database\Factories\UserFactory;
use Dataloft\User\VehicleAccess\Models\VehicleAccess;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }

    public function getVehicles(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class, 'vehicle_accesses')
            ->using(VehicleAccess::class)
            ->withPivot('id');
    }
}
