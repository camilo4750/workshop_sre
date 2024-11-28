<?php

namespace App\Exceptions\Users;

use App\Exceptions\BusinessLogicException;


class UsersNotFoundException extends BusinessLogicException
{
    protected $code = 404;
    protected $message = 'Usuarios no encontrado en el sistema.';

    protected array $errors = [];
}

