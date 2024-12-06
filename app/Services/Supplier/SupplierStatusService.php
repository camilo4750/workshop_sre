<?php

namespace App\Services\Supplier;

use App\Interfaces\Repositories\Supplier\SupplierStatusRepositoryInterface;
use App\Interfaces\Services\Supplier\SupplierStatusServiceInterface;
use Illuminate\Support\Collection;

class SupplierStatusService implements SupplierStatusServiceInterface
{
    private array $errors = [];
    protected SupplierStatusRepositoryInterface $supplierStatusRepo;

    public function __construct()
    {
        $this->supplierStatusRepo = app(SupplierStatusRepositoryInterface::class);
    }
    public function getAll(): Collection
    {
        return $this->supplierStatusRepo->getAll();
    }
}