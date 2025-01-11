<?php

namespace App\Interfaces\Services\EmployeeManagement\Employee;

use App\Dto\EmployeeManagement\Employee\EmployeeDto;
use App\Dto\EmployeeManagement\Employee\EmployeeNewDto;
use App\Dto\EmployeeManagement\Employee\EmployeeUpdateDto;
use App\Entities\Employee\EmployeeEntity;
use Illuminate\Http\Request;

interface EmployeeServiceInterface
{
    public function getAll(): array;

    public function getById(int $employeeId): EmployeeDto;

    public function store(Request $request): ?EmployeeEntity;

    public function storeEmployee(EmployeeNewDto $dto): ?EmployeeEntity;

    public function update(int $employeeId, Request $request): self;

    public function updateEmployee(EmployeeUpdateDto $dto): object;
}
