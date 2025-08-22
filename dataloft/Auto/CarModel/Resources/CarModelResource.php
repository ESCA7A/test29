<?php

namespace Dataloft\Auto\CarModel\Resources;

use Dataloft\Auto\Brand\Resources\BrandResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CarModelResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'brand_id' => $this->brand_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'brand' => new BrandResource($this->whenLoaded('getBrand')),
        ];
    }
}
