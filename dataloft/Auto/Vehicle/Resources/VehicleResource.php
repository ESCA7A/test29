<?php

namespace Dataloft\Auto\Vehicle\Resources;

use Dataloft\Auto\CarModel\Resources\CarModelResource;
use Illuminate\Http\Resources\Json\JsonResource;

final class VehicleResource extends JsonResource
{
    #[\Override]
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'car_model_id' => $this->car_model_id,
            'release_year' => $this->release_year,
            'car_mileage_km' => $this->car_mileage_km,
            'color' => $this->color,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'car_model' => new CarModelResource($this->whenLoaded('getCarModel')),
        ];
    }
}
