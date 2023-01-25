<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     *  Json response boilerplate to
     *  display both success and error message
     */

    public function apiResponse(
        bool $error = true,
        string $message = 'Success',
        int $code = 200,
        $data = null
    ): JsonResponse
    {
        return response()->json([
            'error' => $error,
            'message' => $message,
            'data' => $data,
            'code'=> $code
            ]);
    }
}
