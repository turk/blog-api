<?php

declare(strict_types=1);

namespace App\Services\Search\Searchers;

use App\Models\Article;

class ArticleSearcher extends BaseEloquentSearcher
{
    public function __construct()
    {
        parent::__construct(Article::query());
    }

    protected function applyFilter(array $filter): void
    {
        if (!empty($filter["keyword"])) {
            $this->query
                ->where('title', 'like', '%' . $filter["keyword"] . '%')
                ->orWhere('description', 'like', '%' . $filter["keyword"] . '%');
        }

        if (!empty($filter["category"])) {
            $this->query->where('category_id', '=', $filter["category"]);
        }
    }
}
