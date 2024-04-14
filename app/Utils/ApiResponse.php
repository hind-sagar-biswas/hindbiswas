<?php

namespace App\Utils;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function json(mixed $data = null, int $code = 200, ?string $message = null, array $headers = []): JsonResponse
    {
        $success = ($code >= 200 && $code < 300);
        $data = [
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ];
        return response()->json(['data' => $data], $code, $headers);
    }
}
