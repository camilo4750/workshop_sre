<?php

namespace App\Exceptions\Employee;

use App\Exceptions\BusinessLogicException;


class EmployeeNotFoundException extends BusinessLogicException
{
    protected $code = 404;
    
    protected $message = 'Usuario no encontrado en el sistema.';

    protected array $errors = [];
}

