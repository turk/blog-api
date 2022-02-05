<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\RestResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class CategoryApiController extends BaseApiController
{
    public function topCategories(): JsonResponse
    {
        try {
            $cats = Category::has('articles', '>', 1)
                ->join('articles', 'articles.category_id', '=', 'categories.id')
                ->select('categories.*', DB::raw("SUM(articles.vote) as vote"), DB::raw("count(*) as total"))
                ->groupBy('articles.category_id')
                ->orderBy('vote', 'DESC')
                ->limit(5)
                ->get();

            $data = [
                'items' => CategoryResource::collection($cats),
            ];

            return RestResponse::ok('Operation is successful', $data);
        } catch (Throwable $throwable) {
            Log::error($throwable->getMessage());

            return RestResponse::bad('The request cannot be processed right now.');
        }
    }
}
