<?php

namespace App\Interfaces\Services\Supplier;

use App\Dto\Supplier\SupplierNewDto;
use App\Dto\Supplier\SupplierUpdateDto;
use App\Entities\Supplier\SupplierEntity;
use Illuminate\Http\Request;

interface SupplierServiceInterface
{
    public function getSuppliers(): array;

    public function store(Request $request): SupplierEntity;

    public function storeSupplier(SupplierNewDto $dto): SupplierEntity;

    public function update(int $supplierId, Request $request): self;
    
    public function updateSupplier(SupplierUpdateDto $dto): object;
}
