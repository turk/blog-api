<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateArticleRequest;
use App\Http\Requests\API\UpdateArticleRequest;
use App\Models\Article;
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

    public function update(UpdateArticleRequest $request, Article $article, ArticleCrud $crud)
    {
        $this->authorize('update', $article);

        try {
            $crud->update($article, $request->validated());

            return RestResponse::ok('Article is updated.');
        }catch (Throwable $throwable) {
            Log::error($throwable->getMessage());

            return RestResponse::bad('Update request can not be processed right now.');
        }
    }
}
