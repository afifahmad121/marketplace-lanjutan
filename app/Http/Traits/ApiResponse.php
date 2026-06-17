<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{

    protected function successResponse(mixed $data = null, string $message = 'Data produk berhasil diambil', int $code = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,

        ], $code);
    }


    protected function createdResponse(mixed $data = null, string $message = 'Pesan sukses'): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,

        ], 201);
    }


    protected function errorResponse(string $message = 'Validasi gagal', array $errors = [], int $code = 422): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $errors,
        ], $code);

    }


      protected function notFoundResponse(string $message = 'Data tidak ditemukan'): JsonResponse
    {
       return response()->json([
            'success' => true,
            'message' => $message,

       ],404);
    }

}
