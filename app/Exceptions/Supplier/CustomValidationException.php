<?php

namespace App\Exceptions\Supplier;

use App\Exceptions\BusinessLogicException;

class CustomValidationException extends BusinessLogicException
{
    protected $message = 'Error al validar los datos del proveedor';
    protected $code = 404;
}
