<?php

namespace App\Exceptions\User;

use App\Exceptions\BusinessLogicException;

class CustomValidationException extends BusinessLogicException
{
    protected $message = 'Error al validar los datos';
    protected $code = 404;
}
