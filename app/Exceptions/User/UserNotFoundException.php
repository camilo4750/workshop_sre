<?php

namespace App\Exceptions\User;

use App\Exceptions\BusinessLogicException;


class UserNotFoundException extends BusinessLogicException
{
    protected $code = 404;
    
    protected $message = 'Usuario no encontrado en el sistema.';

    protected array $errors = [];
}

