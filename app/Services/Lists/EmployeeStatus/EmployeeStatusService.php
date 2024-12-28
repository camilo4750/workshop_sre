<?php

namespace App\Services\Lists\EmployeeStatus;

use App\Interfaces\Repositories\Lists\EmployeeStatus\EmployeeStatusRepositoryInterface;
use App\Interfaces\Services\Lists\EmployeeStatus\EmployeeStatusServiceInterface;
use Illuminate\Support\Collection;

class EmployeeStatusService implements EmployeeStatusServiceInterface
{
    private array $errors = [];
    protected EmployeeStatusRepositoryInterface $employeeStatusRepo;

    public function __construct()
    {
        $this->employeeStatusRepo = app(EmployeeStatusRepositoryInterface::class);
    }


    public function getEmployeesStatus(): Collection
    {
        return $this->employeeStatusRepo->getAll();
    }
}