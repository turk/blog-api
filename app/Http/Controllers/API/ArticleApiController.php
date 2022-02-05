<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateArticleRequest;
use App\Services\Crud\ArticleCrud;
use App\Services\RestResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class ArticleApiController extends BaseApiController
{
    public function store(CreateArticleRequest $request, ArticleCrud $crud): JsonResponse
    {
        try {
            $user = $crud->create($request->validated());

            return RestResponse::created('Successfully created.', $user);
        } catch (Throwable $throwable) {
            Log::error($throwable->getMessage());

            return RestResponse::bad('The request cannot be processed right now.');
        }
    }
}
