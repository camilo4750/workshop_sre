<?php

namespace App\Services\Supplier;

use App\Dto\Supplier\supplierNewDto;
use App\Dto\Supplier\SupplierUpdateDto;
use App\Interfaces\Repositories\Supplier\SupplierRepositoryInterface;
use App\Interfaces\services\Supplier\SupplierServiceInterface;

class SupplierService implements SupplierServiceInterface
{
    /**
     * @var SupplierRepositoryInterface
     */
    protected $supplierRepository;

    public function __construct(
        SupplierRepositoryInterface $supplierRepository
    )
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function getAllSuppliers()
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
            ->toggleStatus($active);
    }

    public function update(SupplierUpdateDto $supplierUpdateDto, int $id)
    {
        return $this->supplierRepository
            ->find($id)
            ->update($supplierUpdateDto);
    }
}
