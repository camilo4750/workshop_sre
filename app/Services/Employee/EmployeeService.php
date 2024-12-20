<?php

namespace App\Services\Employee;

use App\Dto\Employee\EmployeeDto;
use App\Dto\Employee\EmployeeNewDto;
use App\Entities\Employee\EmployeeEntity;
use App\Exceptions\Employee\CustomValidationException;
use App\Exceptions\Employee\EmployeeNotFoundException;
use App\Interfaces\Repositories\Employee\EmployeeRepositoryInterface;
use App\Interfaces\Services\Employee\EmployeeServiceInterface;
use App\Mapper\Employee\EmployeeDtoMapper;
use App\Mapper\Employee\EmployeeNewDtoMapper;
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
}
