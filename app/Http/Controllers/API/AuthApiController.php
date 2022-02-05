<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Requests\API\LoginRequest;
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

    public function login(LoginRequest $request): JsonResponse
    {

        if (!$token = auth()->attempt($request->validated())) {
            return response()->json(['error' => 'Wrong email address or password.'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    public function logout()
    {
        auth()->logout();

        return RestResponse::ok('User successfully signed out.');
    }
}
