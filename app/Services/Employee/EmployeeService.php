<?php

namespace App\Services\Employee;

use App\Exceptions\Employee\EmployeeNotFoundException;
use App\Interfaces\Repositories\Employee\EmployeeRepositoryInterface;
use App\Interfaces\Services\Employee\EmployeeServiceInterface;
use App\Mapper\Employee\EmployeeDtoMapper;
use Illuminate\Http\Request;

class EmployeeService implements EmployeeServiceInterface
{
    private array $errors = [];
    protected EmployeeRepositoryInterface $supplierRepo;

    public function __construct()
    {
        $this->supplierRepo = app(EmployeeRepositoryInterface::class);
    }

    public function getAll(): array
    {
        $employees = $this->supplierRepo->getAll();

        throw_if(
            $employees->isEmpty(),
            new EmployeeNotFoundException(
                message: 'Proveedores no encontrados en el sistema'
            )
        );

        return $employees->map(function ($employee) {
            return (new EmployeeDtoMapper)->createFromDbRecord($employee);
        })->toArray();
    }
}
