<?php

namespace App\Repositories\Geographic;

use App\Entities\Geographic\DepartmentEntity;
use App\Interfaces\Repositories\Geographic\DepartmentRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class DepartmentRepository extends CoreRepository implements DepartmentRepositoryInterface
{
    public function getById(int $id): Collection
    {
        return DepartmentEntity::query()
            ->where('country_id', '=', $id)
            ->select('id', 'name', 'code')
            ->get($id);
    }

    public function getAll(): Collection
    {
        return DepartmentEntity::query()
            ->select('id','name')
            ->get();
    }
}