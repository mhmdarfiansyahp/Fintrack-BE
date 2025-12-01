<?php

declare(strict_types=1);

namespace App\Utils\General;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ApiResponse
{
    public static function statusOk(mixed $data = null, string $message = 'OK!', int $code = 200): JsonResponse
    {
        $response = [
            'message' => $message,
        ];

        if ($data instanceof AnonymousResourceCollection) {
            return response()->json($data->response()->getData(true), $code);
        }

        if (!is_null($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }

    public static function statusCreated(string $message = 'Created!'): JsonResponse
    {
        return self::statusOk(null, $message, 201);
    }

    public static function statusUpdated(string $message = 'Updated!'): JsonResponse
    {
        return self::statusOk(null, $message);
    }

    public static function statusDeleted(string $message = 'Deleted!'): JsonResponse
    {
        return self::statusOk(null, $message);
    }

    public static function statusError(string $message = 'Error!', int $code = 500, array|null $errors = null): JsonResponse
    {
        $response = [
            'message' => $message,
        ];

        if ($code <= 400 || $code >= 600) {
            $code = 500;
        }

        if (!is_null($errors)) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $code);
    }
}
