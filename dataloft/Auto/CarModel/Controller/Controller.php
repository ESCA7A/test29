<?php

namespace Dataloft\Auto\CarModel\Controller;

use Dataloft\Auto\CarModel\Models\CarModel;
use App\Http\Controllers\Controller as BaseController;
use Dataloft\Auto\CarModel\Resources\CarModelResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class Controller extends BaseController
{
    public function index(): AnonymousResourceCollection
    {
        return CarModelResource::collection(CarModel::query()->paginate(15));
    }
}
