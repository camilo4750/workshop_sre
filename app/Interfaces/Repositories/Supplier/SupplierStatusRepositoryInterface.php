<?php

namespace App\Interfaces\Repositories\Supplier;

use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Support\Collection;

interface SupplierStatusRepositoryInterface extends CoreRepositoryInterface
{
    public function getAll(): Collection;
}