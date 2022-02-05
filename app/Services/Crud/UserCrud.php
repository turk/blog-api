<?php

declare(strict_types=1);

namespace App\Services\Crud;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserCrud implements CrudInterface
{

    public function create(array $data): array
    {
        $user = new User();
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return $user->toArray();
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
