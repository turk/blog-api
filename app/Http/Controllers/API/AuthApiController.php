<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Requests\API\RegisterRequest;
use App\Services\Crud\UserCrud;
use App\Services\RestResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class AuthApiController extends BaseApiController
{
    /**
     * Register.
     */
    public function register(RegisterRequest $request, UserCrud $userCrud): JsonResponse
    {
        try {
            $user = $userCrud->create($request->validated());

            return RestResponse::created('Registration successful.', $user);
        } catch (Throwable $exception) {
            Log::error($exception->getMessage());

            return RestResponse::bad('The request cannot be processed right now.');
        }
    }
}
