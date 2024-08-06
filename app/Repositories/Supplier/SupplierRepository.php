<?php

namespace App\Repositories\Supplier;

use App\Dto\Supplier\supplierNewDto;
use App\Entities\Supplier\SupplierEntity;
use App\Interfaces\Repositories\Supplier\SupplierRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class SupplierRepository extends CoreRepository implements SupplierRepositoryInterface
{
    public function getNewEntity(): SupplierEntity
    {
        return new SupplierEntity();
    }

    public function findAll(): Collection
    {
        return SupplierEntity::all();
    }

    public function store(supplierNewDto $supplierNewDto): static
    {
        $this->setNewEntity();
        $this->fillDto($supplierNewDto);
        $this->getEntity()->user_who_created_id = Auth::user()->id;
        $this->getEntity()->save();
        return $this;
    }

    public function toggleStatus(bool $active, int $id): static
    {
        $this->getEntity()->active = $active;
        $this->getEntity()->save();
        return $this;
    }
}
