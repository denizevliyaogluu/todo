<?php

namespace App\Helpers;

class ApiResponseHelper
{
    public static function success($data = null, $message = 'Success', $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    public static function error($message = 'Error', $code = 400, $errors = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors,
        ], $code);
    }

    public static function noContent($message = 'No Content')
    {
        return response()->json([
            'success' => true,
            'message' => $message,
        ], 204);
    }

    public static function deleted($message = 'Silme işlemi başarılı')
    {
        return response()->json([
            'success' => true,
            'message' => $message
        ], 200);
    }
}
