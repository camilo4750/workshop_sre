<?php

namespace App\Interfaces\services\Supplier;

use App\Dto\Supplier\supplierNewDto;
use App\Dto\Supplier\SupplierUpdateDto;
use Illuminate\Database\Eloquent\Collection;

interface SupplierServiceInterface
{
    public function getAllSuppliers();

    public function createSupplier(supplierNewDto $supplierNewDto);

    public function toggleStatus(bool $active, int $id);

    public function update(SupplierUpdateDto $supplierUpdateDto, int $id);
}
