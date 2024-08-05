<?php

namespace App\Interfaces\Repositories\Supplier;

use App\Dto\Supplier\supplierNewDto;
use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface SupplierRepositoryInterface extends CoreRepositoryInterface
{
    public function findAll(): Collection;

    public function store(supplierNewDto $supplierNewDto): static;
}
