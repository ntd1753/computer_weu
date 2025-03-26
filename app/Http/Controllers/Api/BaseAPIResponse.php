<?php

namespace App\Http\Controllers\Api;

class BaseAPIResponse
{
    /**
     * Response Success Data
     *
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function responseSuccess($data = [], $message = '')
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
            'code' => 200
        ]);
    }

    /**
     * Response Error Data
     *
     * @param string $errorMessage
     * @param int $responseCode
     * @return \Illuminate\Http\JsonResponse
     */
    public static function responseError($errorMessage = '', $responseCode = 200)
    {
        return response()->json([
            'success' => false,
            'message' => $errorMessage,
            'code' =>$responseCode
        ], $responseCode);
    }
}
