<?php

namespace App\Services\EmployeeManagement\Employee;

use App\Dto\EmployeeManagement\Employee\EmployeeDto;
use App\Dto\EmployeeManagement\Employee\EmployeeNewDto;
use App\Dto\EmployeeManagement\Employee\EmployeeUpdateDto;
use App\Entities\EmployeeManagement\Employee\EmployeeEntity;
use App\Exceptions\EmployeeManagement\Employee\CustomValidationException;
use App\Exceptions\EmployeeManagement\Employee\EmployeeNotFoundException;
use App\Interfaces\Repositories\EmployeeManagement\Employee\EmployeeRepositoryInterface;
use App\Interfaces\Services\EmployeeManagement\Employee\EmployeeServiceInterface;
use App\Mapper\EmployeeManagement\Employee\EmployeeDtoMapper;
use App\Mapper\EmployeeManagement\Employee\EmployeeNewDtoMapper;
use App\Mapper\EmployeeManagement\Employee\EmployeeUpdateDtoMapper;
use Illuminate\Http\Request;

class EmployeeService implements EmployeeServiceInterface
{
    private array $errors = [];
    protected EmployeeRepositoryInterface $employeeRepo;

    public function __construct()
    {
        $this->employeeRepo = app(EmployeeRepositoryInterface::class);
    }

    public function getAll(): array
    {
        $employees = $this->employeeRepo->getAll();

        throw_if(
            count($employees) === 0,
            new EmployeeNotFoundException(
                message: 'Empleados no encontrados en el sistema'
            )
        );

        return $employees;
    }

    public function getById(int $employeeId): EmployeeDto
    {
        $employee = $this->employeeRepo->getById($employeeId);

        throw_if(
            !$employee,
            new EmployeeNotFoundException()
        );

        return (new EmployeeDtoMapper)->createFromDbRecord($employee);
    }

    public function store(Request $request): ?EmployeeEntity
    {
        $existByDocument = $this->employeeRepo->existByDocument($request->get('documentNumber'));

        if ($existByDocument)
            $this->errors['documetNumber'] = 'Numero de documeto ya se encuentra registrado en el sistema.';

        throw_if(
            !empty($this->errors),
            new CustomValidationException($this->errors)
        );

        $supplier = $this->storeEmployee(
            (new EmployeeNewDtoMapper())->createFormRequest($request)
        );

        return $supplier;
    }

    public function storeEmployee(EmployeeNewDto $dto): ?EmployeeEntity
    {
        return $this->employeeRepo
            ->setUser(auth()->user())
            ->store($dto);
    }

    public function update(int $employeeId, Request $request): self
    {
        $employee = $this->employeeRepo->getById($employeeId);

        if (
            $employee->email !== $request->get('email') &&
            $this->employeeRepo->existByDocument($request->get('email'))
        ) {
            $this->errors['documentNumber'] = 'Numero de documento ya se encuentra registrado en el sistema.';
        }
     
        throw_if(
            !empty($this->errors),
            new CustomValidationException($this->errors)
        );

        $dto = (new EmployeeUpdateDtoMapper())->createFromRequest($request);
        $dto->id = $employeeId;

        $this->updateEmployee($dto);
        
        return $this;
    }

    public function updateEmployee(EmployeeUpdateDto $dto): object
    {
        return $this->employeeRepo
        ->setUser(auth()->user())
        ->update($dto);
    }
}
