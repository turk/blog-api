<?php

namespace App\Services\Crud;

use Illuminate\Database\Eloquent\Model;

interface CrudInterface
{
    public function create(array $data): array;

    public function read(int $id): array;

    public function update(Model $entity, array $data): array;

    public function delete(Model $entity): void;
}
