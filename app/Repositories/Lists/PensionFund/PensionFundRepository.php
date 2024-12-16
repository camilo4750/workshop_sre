<?php

namespace App\Repositories\Lists\PensionFund;

use App\Entities\Lists\PensionFund\PensionFundEntity;
use App\Interfaces\Repositories\Lists\PensionFund\PensionFundRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class PensionFundRepository extends CoreRepository implements PensionFundRepositoryInterface
{
    public function getAll(): Collection
    {
        return PensionFundEntity::query()
        ->select([
            'id',
            'name',
        ])
        ->orderBy('id')
        ->get();
    } 
}