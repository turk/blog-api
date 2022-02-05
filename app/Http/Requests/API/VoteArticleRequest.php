<?php

declare(strict_types=1);

namespace App\Http\Requests\API;

use App\Http\Requests\ApiRequest;
use App\Services\RestResponse;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class VoteArticleRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'vote' => [
                'required',
                'integer',
                Rule::in([-1, 1])
            ],
        ];
    }

    protected function response(array $errors): Response
    {
        return RestResponse::bad('Vote article request can\'t be validated', $errors);
    }
}
