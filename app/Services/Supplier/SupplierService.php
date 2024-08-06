<?php

namespace App\Services\Supplier;

use App\Dto\Supplier\supplierNewDto;
use App\Interfaces\Repositories\Supplier\SupplierRepositoryInterface;
use App\Interfaces\services\Supplier\SupplierServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class SupplierService implements SupplierServiceInterface
{
    /**
     * @var SupplierServiceInterface
     */
    protected $supplierRepository;

    public function __construct(
        SupplierRepositoryInterface $supplierRepository
    )
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function getAllSuppliers(): Collection
    {
        return $this->supplierRepository->findAll();
    }

    public function createSupplier(supplierNewDto $supplierNewDto)
    {
        return $this->supplierRepository->store($supplierNewDto);
    }

    public function toggleStatus(bool $active, int $id)
    {
        return $this->supplierRepository
            ->find($id)
            ->toggleStatus($active, $id);
    }
}
