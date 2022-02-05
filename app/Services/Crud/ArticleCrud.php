<?php

declare(strict_types=1);

namespace App\Services\Crud;

use App\Models\Article;

class ArticleCrud implements CrudInterface
{

    public function create(array $data): array
    {
        $article = new Article();
        $article->category_id = $data['category'];
        $article->user_id = auth()->user()->id;
        $article->title = $data['title'];
        $article->description = $data['description'];
        $article->vote = 0;
        $article->save();

        return $article->toArray();
    }

    public function read(int $id): array
    {
        return [];
    }

    public function update(int $id, array $data): array
    {
        return [];
    }

    public function delete(int $id): bool
    {
        return true;
    }
}
