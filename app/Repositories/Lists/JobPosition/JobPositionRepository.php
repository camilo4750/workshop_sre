<?php

namespace App\Repositories\Lists\JobPosition;

use App\Entities\Lists\JobPosition\JobPositionEntity;
use App\Interfaces\Repositories\Lists\JobPosition\JobPositionRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class JobPositionRepository extends CoreRepository implements JobPositionRepositoryInterface
{
    public function getAll(): Collection
    {
        return JobPositionEntity::query()
        ->select([
            'id',
            'name',
        ])
        ->orderBy('id')
        ->get();
    } 
}