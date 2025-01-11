<?php

namespace App\Exceptions\EmployeeManagement\Employee;

use App\Exceptions\BusinessLogicException;

class CustomValidationException extends BusinessLogicException
{
    protected $message = 'Error al validar los datos del empleado';
    protected $code = 404;
}
