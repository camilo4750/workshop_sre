<?php

namespace App\Services\User;

use App\Dto\User\UserNewDto;
use App\Dto\User\UserUpdateDto;
use App\Exceptions\User\CustomValidationException;
use App\Exceptions\User\UsersNotFoundException;
use App\Interfaces\Repositories\User\UserRepositoryInterface;
use App\Interfaces\services\User\UserServiceInterface;
use App\Mapper\User\UserNewDtoMapper;
use App\Mapper\User\UserDtoMapper;
use App\Models\User;
use App\Repositories\System\user\UserRepository;
use Illuminate\Http\Request;

class UserService implements UserServiceInterface
{
    private array $errors = [];
    protected UserRepositoryInterface $userRepo;

    public function __construct()
    {
        $this->userRepo = app(UserRepositoryInterface::class);
    }

    public function getAllUsers(): array
    {
        $users = $this->userRepo->getAllUsers();
        throw_if(
            $users->isEmpty(),
            new UsersNotFoundException()
        );

        return $users->map(function ($user) {
            return (new UserDtoMapper)->createFromDbRecord($user);
        })->toArray();
    }

    public function store(Request $request): User
    {
        $existByEmail = $this->userRepo->existByEmail($request->email);

        if ($existByEmail)
            $this->errors['email'] = 'Correo ya se encuentra registrado en el sistema.';

        throw_if(
            !empty($this->errors),
            new CustomValidationException($this->errors)
        );

        $user = $this->storeUser(
            (new UserNewDtoMapper())->createFormRequest($request)
        );

        return $user;
    }


    public function updateUser(UserUpdateDto $userUpdateDto): UserRepository
    {
        return $this->userRepo
            ->find($userUpdateDto->id)
            ->update($userUpdateDto);
    }

    public function storeUser(UserNewDto $dto): User
    {
        return $this->userRepo
            ->setUser(auth()->user())
            ->store($dto);
    }
}
