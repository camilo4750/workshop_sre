<?php

namespace App\Exceptions\Supplier;

use App\Exceptions\BusinessLogicException;


class SupplierNotFoundException extends BusinessLogicException
{
    protected $code = 404;
    
    protected $message = 'Usuario no encontrado en el sistema.';

    protected array $errors = [];
}

