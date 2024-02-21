<?php

namespace App\Services\User;

use App\Mapper\users\userNewDtoMapper;
use App\Repositories\System\user\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function createUser(Request $request)
    {
        $password = Hash::make($request['data']['password']);
        $userNewMapper = (new userNewDtoMapper());
        $userStoreDto = $userNewMapper->createFormRequest($request['data'], $password);

        $userRepository = (new UserRepository());
        return $userRepository->store($userStoreDto);
    }

    public function getAllUsers(): Collection
    {
        return $this->UserRepository->findAllUsers();
    }
}
