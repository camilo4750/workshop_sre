<?php

namespace App\Repositories\Geographic;

use App\Entities\Geographic\DepartmentEntity;
use App\Interfaces\Repositories\Geographic\DepartmentRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class DepartmentRepository extends CoreRepository implements DepartmentRepositoryInterface
{
    public function find(int $id): Collection
    {
        return DepartmentEntity::find($id);
    }

    public function getAll(): Collection
    {
        return DepartmentEntity::all();
    }
}