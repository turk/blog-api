<?php

namespace App\Services\Crud;

interface CrudInterface
{
    public function create(array $data): array;

    public function read(int $id): array;

    public function update(int $id, array $data): array;

    public function delete(int $id): bool;

}
