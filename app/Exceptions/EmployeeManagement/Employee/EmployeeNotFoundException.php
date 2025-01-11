<?php

namespace App\Exceptions\EmployeeManagement\Employee;

use App\Exceptions\BusinessLogicException;


class EmployeeNotFoundException extends BusinessLogicException
{
    protected $code = 404;
    
    protected $message = 'Empleado no encontrado en el sistema.';

    protected array $errors = [];
}

