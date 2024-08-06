<?php

namespace App\Repositories\Supplier;

use App\Dto\Supplier\supplierNewDto;
use App\Dto\Supplier\SupplierUpdateDto;
use App\Entities\Supplier\SupplierEntity;
use App\Interfaces\Repositories\Supplier\SupplierRepositoryInterface;
use App\Mapper\Supplier\supplierDtoMapper;
use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class SupplierRepository extends CoreRepository implements SupplierRepositoryInterface
{
    public function getNewEntity(): SupplierEntity
    {
        return new SupplierEntity();
    }

    public function findAll(): array
    {
        $suppliers = SupplierEntity::orderBy('id')->get()->toArray();
        return array_map(function ($suppliers) {
            return (new supplierDtoMapper())
                ->createFromDbRecord($suppliers);
        }, $suppliers);
    }

    public function store(supplierNewDto $supplierNewDto): static
    {
        $this->setNewEntity();
        $this->fillDto($supplierNewDto);
        $this->getEntity()->user_who_created_id = Auth::user()->id;
        $this->getEntity()->save();
        return $this;
    }

    public function toggleStatus(bool $active): static
    {
        $this->getEntity()->active = $active;
        $this->getEntity()->save();
        return $this;
    }

    public function update(SupplierUpdateDto $supplierUpdateDto): static
    {
        $this->fillDto($supplierUpdateDto);
        $this->getEntity()->save();
        return $this;
    }
}
