<?php

namespace App\Services\Geographic;

use App\Interfaces\Repositories\Geographic\DepartmentRepositoryInterface;
use App\Interfaces\Services\Geographic\DepartmentServiceInterface;
use Illuminate\Support\Collection;

class DepartmentService implements DepartmentServiceInterface
{
    private array $errors = [];
    protected DepartmentRepositoryInterface $departmentRepo;

    public function __construct()
    {
        $this->departmentRepo = app(DepartmentRepositoryInterface::class);
    }

    public function getById(int $id): Collection
    {
        return $this->departmentRepo->getById($id);
    }

    public function getDepartments(): Collection
    {
        return $this->departmentRepo->getAll();
    }
}