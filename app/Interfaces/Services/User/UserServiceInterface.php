<?php

namespace App\Interfaces\Services\User;

use App\Dto\User\UserNewDto;
use App\Dto\User\UserUpdateDto;
use App\Models\User;
use Illuminate\Http\Request;

interface UserServiceInterface
{
    public function store(Request $request): User;

    public function getAllUsers(): array;

    public function update(int $userId, Request $request);

    public function storeUser(UserNewDto $dto): User;

    public function updateUser(UserUpdateDto $dto);
}
