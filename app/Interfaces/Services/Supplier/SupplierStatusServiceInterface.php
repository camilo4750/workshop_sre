<?php

namespace App\Interfaces\Services\Supplier;

use Illuminate\Support\Collection;

interface SupplierStatusServiceInterface
{
    public function getAll(): Collection;
}