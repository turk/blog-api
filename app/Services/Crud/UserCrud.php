<?php

declare(strict_types=1);

namespace App\Services\Crud;

class UserCrud implements CrudInterface
{

    public function create(array $data): array
    {
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
