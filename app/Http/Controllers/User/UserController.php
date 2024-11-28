<?php

namespace App\Http\Controllers\User;

use App\Exceptions\RepositoryBaseException;
use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Mapper\users\userNewDtoMapper;
use App\Mapper\users\userUpdateDtoMapper;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\JsonResponse;

class UserController
{
    /**
     * @var UserServiceInterface
     */
    protected $userService;

    public function __construct(
        UserServiceInterface $userService,
    )
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('User/index');
    }

    public function allUsers(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            return [
                'users' => $this->userService->getAllUsers(),
                'message' => 'Usuarios obtenidos correctamente'
            ];
        });

    }

    public function store(Request $request): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () use ($request) {
            (new UserControllerValidate())->validateForm($request);

            $userNewDtoMapper = new userNewDtoMapper();
            $userNewDto = $userNewDtoMapper->createFormRequest($request);
            $this->userService->createUser($userNewDto);
            return [
                'message' => 'Usuario creado con éxito',
            ];
        });
    }

    public function update(Request $request): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () use ($request) {
            (new UserControllerValidate())->validateFormUpdate($request);

            $userEditDtoMapper = new userUpdateDtoMapper();
            $userEditDto = $userEditDtoMapper->updateFormRequest($request);
            $this->userService->updateUser($userEditDto);
            return [
                "message" => "usuario actualizado"
            ];
        });
    }
}

