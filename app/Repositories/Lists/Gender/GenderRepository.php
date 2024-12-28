<?php

namespace App\Repositories\Lists\Gender;

use App\Entities\Lists\Gender\GenderEntity;
use App\Interfaces\Repositories\Lists\Gender\GenderRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class GenderRepository extends CoreRepository implements GenderRepositoryInterface
{
    public function getAll(): Collection
    {
        return GenderEntity::query()
        ->select([
            'id',
            'name',
        ])
        ->orderBy('id')
        ->get();
    } 
}