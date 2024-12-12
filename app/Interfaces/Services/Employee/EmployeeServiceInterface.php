<?php

namespace App\Interfaces\Services\Employee;

use Illuminate\Http\Request;

interface EmployeeServiceInterface
{
    public function getAll(): array;
}
