<?php

namespace App\Repositories\Lists\Arl;

use App\Entities\Lists\Arl\ArlEntity;
use App\Interfaces\Repositories\Lists\Arl\ArlRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class ArlRepository extends CoreRepository implements ArlRepositoryInterface
{
    public function getAll(): Collection
    {
        return ArlEntity::query()
        ->select([
            'id',
            'name',
        ])
        ->orderBy('id')
        ->get();
    } 
}