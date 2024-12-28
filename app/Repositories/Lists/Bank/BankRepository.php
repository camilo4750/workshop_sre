<?php

namespace App\Repositories\Lists\Bank;

use App\Entities\Lists\Bank\BankEntity;
use App\Interfaces\Repositories\Lists\Bank\BankRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class BankRepository extends CoreRepository implements BankRepositoryInterface
{
    public function getAll(): Collection
    {
        return BankEntity::query()
        ->select([
            'id',
            'name',
        ])
        ->orderBy('id')
        ->get();
    } 
}