<?php

namespace App\Interfaces\Repositories\EmployeeManagement\Employee;

use App\Dto\EmployeeManagement\Employee\EmployeeNewDto;
use App\Dto\EmployeeManagement\Employee\EmployeeUpdateDto;
use App\Entities\EmployeeManagement\Employee\EmployeeEntity;
use App\Interfaces\Repositories\CoreRepositoryInterface;

interface EmployeeRepositoryInterface extends CoreRepositoryInterface
{
    public function getAll(): array;

    public function getById(int $employeeId): ?EmployeeEntity;

    public function existByDocument(string $documentNumber): bool;

    public function store(EmployeeNewDto $dto): ?EmployeeEntity;

    public function update(EmployeeUpdateDto $dto): self;
}
