<?php

declare(strict_types=1);

namespace App\Http\Requests\API;

use App\Http\Requests\ApiRequest;
use App\Services\RestResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdateArticleRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'category' => 'required|integer|exists:categories,id',
            'title' => 'required',
            'description' => 'required',
        ];
    }

    protected function response(array $errors): Response
    {
        return RestResponse::bad('Update article request can\'t be validated', $errors);
    }
}
