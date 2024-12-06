<?php

namespace App\Services\Geographic;

use App\Interfaces\Repositories\Geographic\DepartmentRepositoryInterface;
use App\Interfaces\Services\Geographic\DepartmentServiceInterface;

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
        return $this->departmentRepo->find($id);
    }

    public function getDepartments()
    {
        return $this->departmentRepo->getAll();
    }
}