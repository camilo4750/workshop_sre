<?php

namespace App\Services\User;

use App\Dto\user\userNewDto;
use App\Dto\user\userUpdateDto;
use App\Repositories\System\user\UserRepository;
use Illuminate\Support\Collection;

interface UserServiceInterface
{
    public function createUser(userNewDto $userNewDto);

    public function getAllUsers(): Collection;

    public function updateUser(userUpdateDto $userUpdateDto): UserRepository;
}
