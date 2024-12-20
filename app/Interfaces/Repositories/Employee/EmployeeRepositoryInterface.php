<?php

namespace App\Interfaces\Repositories\Employee;

use App\Dto\Employee\EmployeeNewDto;
use App\Entities\Employee\EmployeeEntity;
use App\Interfaces\Repositories\CoreRepositoryInterface;

interface EmployeeRepositoryInterface extends CoreRepositoryInterface
{
    public function getAll(): array;

    public function getById(int $employeeId): ?EmployeeEntity;

    public function existByDocument(string $documentNumber): bool;

    public function store(EmployeeNewDto $dto): ?EmployeeEntity;
}
