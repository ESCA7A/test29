<?php

namespace Dataloft\Auto\CarModel\Controller;

use Dataloft\Application\Routing\Controllers\BaseController;
use Dataloft\Auto\CarModel\Models\CarModel;
use Dataloft\Auto\CarModel\Resources\CarModelResource;
use Illuminate\Http\JsonResponse;

final class Controller extends BaseController
{
    /**
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function index(): JsonResponse
    {
        return $this->asJson(CarModelResource::collection(CarModel::query()->paginate(15)));
    }
}
