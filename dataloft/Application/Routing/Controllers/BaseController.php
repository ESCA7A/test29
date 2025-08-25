<?php

namespace Dataloft\Application\Routing\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\LaravelData\Data;

class BaseController extends Controller
{
    /**
     * @param array|Data|AnonymousResourceCollection $data
     * @param int $status
     * @param array $headers
     * @param int $options
     * @return JsonResponse
     */
    public function asJson(array|Data|AnonymousResourceCollection $data = [], int $status = 200, array $headers = [], int $options = 0): JsonResponse
    {
        return response()->json($data, $status, $headers, $options);
    }
}
