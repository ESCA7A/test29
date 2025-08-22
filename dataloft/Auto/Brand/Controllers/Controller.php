<?php

namespace Dataloft\Auto\Brand\Controllers;

use Dataloft\Auto\Brand\Models\Brand;
use Dataloft\Auto\Brand\Resources\BrandResource;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class Controller extends BaseController
{
    public function index(): AnonymousResourceCollection
    {
        return BrandResource::collection(Brand::query()->paginate(15));
    }
}
