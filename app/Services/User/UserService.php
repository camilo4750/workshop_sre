<?php

namespace App\Services\User;

use App\Dto\user\userNewDto;
use App\Dto\user\userUpdateDto;
use App\Repositories\System\user\UserRepository;
use \Illuminate\Support\Collection;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepository
     */
    protected $UserRepository;

    public function __construct(
        UserRepository $UserRepository,
    )
    {
        $this->UserRepository = $UserRepository;
    }

    public function createUser(userNewDto $userNewDto)
    {
        return $this->UserRepository->store($userNewDto);
    }

    public function getAllUsers(): Collection
    {
        return $this->UserRepository->findAllUsers();
    }

    public function updateUser(userUpdateDto $userUpdateDto): UserRepository
    {
        return $this->UserRepository
            ->find($userUpdateDto->id)
            ->update($userUpdateDto);
    }
}
