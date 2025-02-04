<?php

namespace App\Exceptions\EmployeeManagement\EmployeePayment;

use App\Exceptions\BusinessLogicException;


class EmployeePaymentNotFoundException extends BusinessLogicException
{
    protected $code = 404;

    protected $message = 'Pago de empleado no encontrado en el sistema.';

    protected array $errors = [];
}

