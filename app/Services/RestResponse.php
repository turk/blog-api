<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RestResponse
{
    /**
     * Bad response.
     *
     * @param string $message
     * @param array $errors
     *
     * @return JsonResponse
     */
    public static function bad(string $message, array $errors = []): JsonResponse
    {
        $response = [
            'message' => $message,
            'errors' => $errors
        ];

        return response()->json($response, 400);
    }

    /**
     * Created response.
     *
     * @param string $message
     * @param array $data
     *
     * @return JsonResponse
     */
    public static function created(string $message, array $data): JsonResponse
    {
        return self::ok($message, $data, Response::HTTP_CREATED);
    }

    /**
     * Success response.
     *
     * @param string $message
     * @param array $data
     * @param int $status
     *
     * @return JsonResponse
     */
    public static function ok(string $message, array $data = [], int $status = Response::HTTP_OK): JsonResponse
    {
        $response = [
            'message' => $message,
            'data' => $data
        ];

        return response()->json($response, $status);
    }

    /**
     * Unauthorized response.
     *
     * @param string $message
     * @param int $status
     *
     * @return JsonResponse
     */
    public static function unauthorized(string $message, int $status = Response::HTTP_UNAUTHORIZED): JsonResponse
    {
        $response = [
            'message' => $message,
            'data' => []
        ];

        return response()->json($response, $status);
    }
}
