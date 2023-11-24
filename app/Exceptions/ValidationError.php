<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ValidationError extends Exception {
    public function render(): JsonResponse {
        throw new HttpResponseException(response()->json([
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'data' => json_decode($this->message),
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}