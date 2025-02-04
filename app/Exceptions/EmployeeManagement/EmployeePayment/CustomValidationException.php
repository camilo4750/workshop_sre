<?php

namespace App\Exceptions\EmployeeManagement\EmployeePayment;

use App\Exceptions\BusinessLogicException;

class CustomValidationException extends BusinessLogicException
{
    protected $message = 'Error al validar los datos del pago';
    protected $code = 404;
}
