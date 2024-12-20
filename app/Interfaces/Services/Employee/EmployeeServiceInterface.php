<?php

namespace App\Interfaces\Services\Employee;

use App\Dto\Employee\EmployeeDto;
use App\Dto\Employee\EmployeeNewDto;
use App\Entities\Employee\EmployeeEntity;
use Illuminate\Http\Request;

interface EmployeeServiceInterface
{
    public function getAll(): array;

    public function getById(int $employeeId): EmployeeDto;

    public function store(Request $request): ?EmployeeEntity;

    public function storeEmployee(EmployeeNewDto $dto): ?EmployeeEntity;
}
