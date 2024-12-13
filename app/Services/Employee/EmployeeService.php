<?php

namespace App\Services\Employee;

use App\Dto\Employee\EmployeeDto;
use App\Exceptions\Employee\EmployeeNotFoundException;
use App\Interfaces\Repositories\Employee\EmployeeRepositoryInterface;
use App\Interfaces\Services\Employee\EmployeeServiceInterface;
use App\Mapper\Employee\EmployeeDtoMapper;
use App\Mapper\Employee\EmployeeTableDtoMapper;
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
                message: 'Empleados no encontrados en el sistema'
            )
        );

        return $employees->map(function ($employee) {
            return (new EmployeeTableDtoMapper)->createFromDbRecord($employee);
        })->toArray();
    }

    public function getById(int $employeeId)   
    {
        $employee = $this->supplierRepo->getById($employeeId);

        throw_if(
            !$employee,
            new EmployeeNotFoundException()
        );
        
        return (new EmployeeDtoMapper)->createFromDbRecord($employee);
    }
}
