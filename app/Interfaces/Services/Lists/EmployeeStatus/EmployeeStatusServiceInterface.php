<?php

namespace App\Interfaces\Services\Lists\EmployeeStatus;

use Illuminate\Support\Collection;

interface EmployeeStatusServiceInterface
{
    public function getEmployeesStatus(): Collection;
}