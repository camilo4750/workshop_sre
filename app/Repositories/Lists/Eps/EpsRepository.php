<?php

namespace App\Repositories\Lists\Eps;

use App\Entities\Lists\Eps\EpsEntity;
use App\Interfaces\Repositories\Lists\Eps\EpsRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class EpsRepository extends CoreRepository implements EpsRepositoryInterface
{
    public function getAll(): Collection
    {
        return EpsEntity::query()
        ->select([
            'id',
            'name',
        ])
        ->orderBy('id')
        ->get();
    } 
}