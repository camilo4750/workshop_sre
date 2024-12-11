<?php

namespace App\Repositories\Supplier;

use App\Entities\Supplier\SupplierStatusEntity;
use App\Interfaces\Repositories\Supplier\SupplierStatusRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class SupplierStatusRepository extends CoreRepository implements SupplierStatusRepositoryInterface
{
    public function getAll(): Collection
    {
        return SupplierStatusEntity::query()
            ->select('id', 'name')
            ->get();
    }
}   