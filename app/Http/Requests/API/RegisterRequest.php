<?php

declare(strict_types=1);

namespace App\Http\Requests\API;

use App\Http\Requests\ApiRequest;
use App\Services\RestResponse;
use Symfony\Component\HttpFoundation\Response;

class RegisterRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ];
    }

    protected function response(array $errors): Response
    {
        return RestResponse::bad('Register request can\'t be validated', $errors);
    }
}
