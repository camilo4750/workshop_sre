<?php

namespace App\Interfaces\Repositories\Supplier;

use App\Dto\Supplier\supplierNewDto;
use App\Dto\Supplier\SupplierUpdateDto;
use App\Entities\Supplier\SupplierEntity;
use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Support\Collection;

interface SupplierRepositoryInterface extends CoreRepositoryInterface
{
    public function getById(int $id): ?SupplierEntity;

    public function findAll(): Collection;

    public function store(supplierNewDto $dto): SupplierEntity;

    public function update(SupplierUpdateDto $dto): self;
    
    public function existByEmail(string $email): bool;
}
