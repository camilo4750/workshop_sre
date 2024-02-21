<?php

namespace App\Http\Controllers\User;

use App\Exceptions\RepositoryBaseException;
use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Mapper\users\userNewDtoMapper;
use App\Repositories\System\user\UserRepository;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Validation\Rules\Password;

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

    public function allUsers()
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            $users = $this->userService->getAllUsers();

            return [
                'users' => $users
            ];
        });
    }

    public function store(Request $request)
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () use($request) {
            Validator::make($request['data'], [
                'firstName' => ['required', 'string', 'max:255'],
                'secondName' => ['required', 'string', 'max:255'],
                'firstSurname' => ['required', 'string', 'max:255'],
                'secondSurname' => ['required', 'string', 'max:255'],
                'telephone' => ['required', 'int'],
                'typeUser' => ['required'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                ],
                'password' => ['required', 'string', Password::default(), 'confirmed'],
            ])->validate();

            try {
                $this->userService->createUser($request);
                return [
                    'message' => 'Usuario creado con éxito',
                ];
            }catch (\Exception $e) {
                throw new RepositoryBaseException("Failure to store", $e->getCode(), $e);
            }
        });
    }
}
