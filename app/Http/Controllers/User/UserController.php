<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController
{
    protected $userService;

    public function __construct(
        UserServiceInterface $userService,
    ) {
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

            (new UserControllerValidate())
                ->validateStoreRequest($request);


            $user = $this->userService
                ->store($request);

            return [
                'message' => 'Usuario creado con éxito',
                'id' => $user->id,
            ];
        });
    }

    public function update(Request $request, int $userId): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () use ($request, $userId,) {
            (new UserControllerValidate())
                ->validateUpdateRequest($request);

            $this->userService
                ->update($userId, $request);
                
            return [
                "message" => "usuario actualizado"
            ];
        });
    }
}
