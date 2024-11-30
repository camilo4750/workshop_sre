<?php

namespace App\Interfaces\Repositories\User;

use App\Dto\User\UserNewDto;
use App\Dto\User\UserUpdateDto;
use App\Interfaces\Repositories\CoreRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface extends CoreRepositoryInterface
{
    public function getById(int $id): ?User;

    public function store(UserNewDto $userNewDto): ?User;

    public function getAllUsers(): Collection;

    public function existByEmail(string $email): bool;

    public function update(UserUpdateDto $userUpdateDto): static;
}
