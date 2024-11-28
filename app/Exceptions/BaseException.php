<?php

namespace App\Exceptions;

class BaseException extends \Exception
{
    protected $message = '';
    protected $code= 0;
    protected array $errors;

    public function __construct(array $errors = [], string $message = null, int $code = 0, ?Throwable $previous = null)
    {
        $this->errors = $errors;
        parent::__construct($message ?? $this->message, $code, $previous);
    }

    public function getErrors():array
    {
        return $this->errors;
    }
}