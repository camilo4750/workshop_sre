<?php

namespace App\Interfaces\Repositories\Employee;

use App\Entities\Employee\EmployeeEntity;
use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Support\Collection;

interface EmployeeRepositoryInterface extends CoreRepositoryInterface
{
    public function getAll(): Collection;

    public function getById(int $employeeId);
}
