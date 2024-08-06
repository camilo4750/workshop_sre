<?php

namespace App\Interfaces\Repositories\Supplier;

use App\Dto\Supplier\supplierNewDto;
use App\Dto\Supplier\SupplierUpdateDto;
use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface SupplierRepositoryInterface extends CoreRepositoryInterface
{
    public function findAll();

    public function store(supplierNewDto $supplierNewDto): static;

    public function toggleStatus(bool $active): static;

    public function update(SupplierUpdateDto $supplierUpdateDto): static;

}
