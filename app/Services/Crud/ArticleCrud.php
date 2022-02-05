<?php

declare(strict_types=1);

namespace App\Services\Crud;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

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

    public function update(Article|Model $entity, array $data): array
    {
        $entity->category_id = $data['category'];
        $entity->title = $data['title'];
        $entity->description = $data['description'];
        $entity->save();

        return $entity->toArray();
    }

    public function delete(Article|Model $entity): void
    {
        Article::destroy($entity->id);
    }
}
