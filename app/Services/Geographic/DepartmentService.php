<?php

namespace App\Services\Geographic;

use App\Interfaces\Repositories\Geographic\DepartmentRepositoryInterface;
use App\Interfaces\services\Geographic\DepartmentServiceInterface;

class DepartmentService implements DepartmentServiceInterface
{
    private array $errors = [];
    protected DepartmentRepositoryInterface $departmentRepo;

    public function __construct()
    {
        $this->departmentRepo = app(DepartmentRepositoryInterface::class);
    }

    public function getDepartment(int $id)
    {
        $department = $this->departmentRepo->find($id);
    }
}