<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

class BaseAPIController extends Controller
{
    /**
     * Response Success Data
     *
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseSuccess($data = [], $message = 'Get data success')
    {
        return BaseAPIResponse::responseSuccess($data, $message);
    }

    /**
     * Response Error Data
     *
     * @param string $errorMessage
     * @param int $responseCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseError($errorMessage = '', $responseCode = 200)
    {
        return BaseAPIResponse::responseError($errorMessage, $responseCode);
    }
}
