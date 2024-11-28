<?php

namespace App\Services\User;

use App\Dto\user\userNewDto;
use App\Dto\user\userUpdateDto;
use App\Exceptions\Users\UsersNotFoundException;
use App\Repositories\System\user\UserRepository;
use \Illuminate\Support\Collection;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    public function __construct(
        UserRepository $UserRepository,
    ) {
        $this->userRepository = $UserRepository;
    }

    public function createUser(userNewDto $userNewDto)
    {
        return $this->userRepository->store($userNewDto);
    }

    public function getAllUsers(): Collection
    {
      
       $users = collect([]);
        throw_if(
            $users->isEmpty(),
            new UsersNotFoundException()
        );

        return $users;
    }

    public function updateUser(userUpdateDto $userUpdateDto): UserRepository
    {
        return $this->userRepository
            ->find($userUpdateDto->id)
            ->update($userUpdateDto);
    }
}
