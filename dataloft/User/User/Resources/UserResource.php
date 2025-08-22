<?php

namespace Dataloft\User\User\Resources;

use Dataloft\Auto\Vehicle\Resources\VehicleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'password' => $this->password,
            'remember_token' => $this->remember_token,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'vehicles' => VehicleResource::collection($this->whenLoaded('getVehicles')),
        ];
    }
}
