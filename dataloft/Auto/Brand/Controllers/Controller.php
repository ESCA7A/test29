<?php

namespace Dataloft\Auto\Brand\Controllers;

use Dataloft\Application\Routing\Controllers\BaseController;
use Dataloft\Auto\Brand\Models\Brand;
use Dataloft\Auto\Brand\Resources\BrandResource;
use Illuminate\Http\JsonResponse;

class Controller extends BaseController
{
    public function index(): JsonResponse
    {
        return $this->asJson(BrandResource::collection(Brand::query()->paginate(15)));
    }
}
