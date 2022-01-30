<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use \Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;

class StarWarsController extends Controller
{
    /**
     * [GET]StarWarsの映画をAPIで取得し、その結果をレスポンスで返す
     *
     * @return JsonResponse StarWarsの映画取得結果
     */
    public function __invoke(): JsonResponse
    {
        $response = # ここを実装してください
        return response()->json([
            'title' => $response["title"],
            'release_date' => $response["release_date"],
        ], Response::HTTP_OK);
    }
}
