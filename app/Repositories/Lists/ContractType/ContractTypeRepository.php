<?php

namespace App\Repositories\Lists\ContractType;

use App\Entities\Lists\ContractType\ContractTypeEntity;
use App\Interfaces\Repositories\Lists\ContractType\ContractTypeRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class ContractTypeRepository extends CoreRepository implements ContractTypeRepositoryInterface
{
    public function getAll(): Collection
    {
        return ContractTypeEntity::query()
        ->select([
            'id',
            'name',
        ])
        ->orderBy('id')
        ->get();
    } 
}