<?php

declare(strict_types=1);

namespace App\Http\Requests\API;

use App\Http\Requests\ApiRequest;
use App\Services\RestResponse;
use Symfony\Component\HttpFoundation\Response;

class SearchArticleRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'sort' => ['nullable', 'string', 'in:created_at.asc,created_at.desc,title.asc,title.desc'],
            'keyword' => ['nullable', 'string'],
            'category' => ['nullable', 'integer'],
            'pageNr' => ['nullable', 'string'],
            'pageSize' => ['nullable', 'string'],
        ];
    }

    protected function response(array $errors): Response
    {
        return RestResponse::bad('Search article request can\'t be validated', $errors);
    }
}
