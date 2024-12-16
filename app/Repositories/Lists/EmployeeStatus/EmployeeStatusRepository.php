<?php

namespace App\Repositories\Lists\EmployeeStatus;

use App\Entities\Lists\EmployeeStatus\EmployeeStatusEntity;
use App\Interfaces\Repositories\Lists\EmployeeStatus\EmployeeStatusRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class EmployeeStatusRepository extends CoreRepository implements EmployeeStatusRepositoryInterface
{
    public function getAll(): Collection
    {
        return EmployeeStatusEntity::query()
        ->select([
            'id',
            'name',
        ])
        ->orderBy('id')
        ->get();
    } 
}