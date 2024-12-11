<?php

namespace App\Services\User;

use App\Dto\User\UserNewDto;
use App\Dto\User\UserUpdateDto;
use App\Exceptions\User\CustomValidationException;
use App\Exceptions\User\UserNotFoundException;
use App\Exceptions\User\UsersNotFoundException;
use App\Interfaces\Repositories\User\UserRepositoryInterface;
use App\Interfaces\Services\User\UserServiceInterface;
use App\Mapper\User\UserNewDtoMapper;
use App\Mapper\User\UserDtoMapper;
use App\Mapper\User\UserUpdateDtoMapper;
use App\Models\User;
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


    public function update(int $userId, Request $request)
    {
        $user = $this->userRepo->getById($request->userId);

        throw_if(
            is_null($user),
            new UserNotFoundException()
        );

        if (
            $user->email !== $request->get('email') &&
            $this->userRepo->existByEmail($request->get('email'))
        ) {
            $this->errors['email'] = 'Correo ya se encuentra registrado en el sistema.';
        }

        throw_if(
            !empty($this->errors),
            new CustomValidationException($this->errors)
        );

        $dto = (new UserUpdateDtoMapper())->createFromRequest($request);
        $dto->id = $userId;

        $this->updateUser($dto);

        return $this;
    }

    public function storeUser(UserNewDto $dto): User
    {
        return $this->userRepo
            ->setUser(auth()->user())
            ->store($dto);
    }

    public function updateUser(UserUpdateDto $dto)
    {
        return $this->userRepo
            ->setUser(auth()->user())
            ->update($dto);
    }
}
