<?php

declare(strict_types=1);

namespace App\Services\Crud;

class ArticleCrud implements CrudInterface
{

    public function create(array $data): array
    {
        return [];
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
