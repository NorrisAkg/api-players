<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

abstract class ApiBaseController extends Controller
{
    protected function successResponse($data = [], $status = 200, string $message = 'Success'): JsonResponse
    {
        return response()->json(data:[
            'data'            => $data,
            'success'         => true,
            'success_message' => $message,
        ], status: $status,);
    }

    protected function errorResponse($data = [], $status = 400, string $message = 'An error occured'): JsonResponse
    {
        return response()->json(data:[
            'data'           => $data,
            'success'        => false,
            'error_message'  => $message,
        ], status: $status,);
    }
}
