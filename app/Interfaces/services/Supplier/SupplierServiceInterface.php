<?php

namespace App\Interfaces\services\Supplier;

use App\Dto\Supplier\supplierNewDto;
use Illuminate\Database\Eloquent\Collection;

interface SupplierServiceInterface
{
    public function getAllSuppliers(): Collection;

    public function createSupplier(supplierNewDto $supplierNewDto);
}
